<?php

namespace App\Admin\Controllers;

use App\Models\Geos;
use App\Models\Locations;
use App\Models\Message;
use App\Models\Offer;
use App\Models\OfferLog;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Widgets\Box;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Encore\Admin\Facades\Admin;


class HomeController extends Controller
{


    public function index(Content $content)
    {


        Admin::disablePjax();


        $currentUser = auth()->user(); // 获取当前登录用户的模型对象
        $roles = $currentUser->roles; // 获取当前用户的角色集合


       $admin_id = $currentUser->id;

//                    print_r("<pre/>");

//        print_r($roles);exit;

        $role_name = $currentUser->roles[0]->name;

//        print_r($roleName);exit;


        $role = '';
        foreach ($roles as $role) {
            $role = $role->id;
//            $role_name = $role->name;

//            print_r("<pre/>");
//            print_r($role_name);exit;

        }
//        print_r("<pre/>");
//        print_r($admin_id);exit;


        if(!Admin::user()->isAdministrator() && $role_name!=='manage'){
            $whereRole = "FIND_IN_SET($role, o.admin_roles_id)";

            $offer_admin = [['offer_logs.admin_id','=',$admin_id]];
            $offer_admin1 = [['log.admin_id','=',$admin_id]];


        }else{

            $whereRole = '1=1';
            $offer_admin = [['offer_logs.admin_id','<>',0]];
            $offer_admin1 = [['log.admin_id','<>',0]];


        }



//        print_r($offer_admin);exit;

        $data = [];
        //总销量


//        DB::enableQueryLog();

//        print_r($offer_admin);exit;

        $data['total_sale'] = OfferLog::where('offer_logs.status', 2)
            ->leftJoin('offers AS o', 'offer_logs.offer_id', '=', 'o.id')
//            ->whereRaw($whereRole)
            ->where($offer_admin)

            ->sum('offer_logs.revenue');

        $queryLog = DB::getQueryLog();

//        print_r("<pre/>");
//        print_r($data['total_sale'] );exit;

        //当天的销量
        $data['today_sale'] = OfferLog::where('offer_logs.status', 2)
            ->leftJoin('offers AS o', 'offer_logs.offer_id', '=', 'o.id')

            ->where('offer_logs.created_at', '>', date('Y-m-d 00:00:00'))
            ->where('offer_logs.created_at', '<=', date('Y-m-d 23:59:59'))
//            ->whereRaw($whereRole)
            ->where($offer_admin)

            ->sum('offer_logs.revenue');
        //当月的销量
        $data['month_sale'] = OfferLog::where('offer_logs.status', 2)
            ->leftJoin('offers AS o', 'offer_logs.offer_id', '=', 'o.id')

            ->where('offer_logs.created_at', '>', date('Y-m-1 00:00:00'))
            ->where('offer_logs.created_at', '<=', date('Y-m-t 23:59:59'))
//            ->whereRaw($whereRole)
            ->where($offer_admin)

            ->sum('offer_logs.revenue');
        //最近五个销售offer
        $data['offer_info'] = DB::table('offer_logs AS log')
            ->where('log.status', 2)
            ->where($offer_admin1)

            ->leftJoin('offers AS o', 'log.offer_id', '=', 'o.id')
//            ->whereRaw($whereRole)
            ->select('log.created_at', 'o.offer_name', 'log.revenue')
            ->orderByDesc('log.created_at')
            ->limit(5)
            ->get()->toArray();

        //当天销量最多的国家数组以及占比百分比
        $country_top = DB::table('offer_logs AS log')
            ->leftJoin('offers AS o', 'log.offer_id', '=', 'o.id')
//            ->whereRaw($whereRole)
            ->where($offer_admin1)

            ->where('log.status', 2)
            ->where('log.created_at', '>', date('Y-m-d 00:00:00'))
            ->where('log.created_at', '<=', date('Y-m-d 23:59:59'))
            ->leftJoin('geos AS g', 'log.country_id', '=', 'g.id')
            ->select(DB::raw('sum(log.revenue) as country_total'), 'log.country_id', 'country')
            ->groupBy('log.country_id')
            ->orderByDesc('country_total')
            ->first();

        $data['country'] = $country_top->country ?? '';
        $data['country_total'] = $country_top->country_total ?? 0;

        if ($data['today_sale'] == 0) {
            $data['country_percent'] = '0';
        } else {
            $data['country_percent'] = round(($data['country_total'] / $data['today_sale']) * 100);
        }

        //当天销量最多的offer数组以及占比百分比
        $offer_top = DB::table('offer_logs AS log')->where('log.status', 2)
            ->where('log.created_at', '>', date('2023-01-01 00:00:00'))
            ->where('log.created_at', '<=', date('Y-m-d 23:59:59'))
            ->leftJoin('offers AS o', 'log.offer_id', '=', 'o.id')
            ->select(DB::raw('sum(log.revenue) as offer_total'), 'log.offer_id', 'o.offer_name')
//            ->whereRaw($whereRole)
            ->where($offer_admin1)

            ->groupBy('log.offer_id')
            ->orderByDesc('offer_total')
            ->first();

        $data['offer_name'] = $offer_top->offer_name ?? '';
        $data['offer_total'] = $offer_top->offer_total ?? 0;

        if ($data['today_sale'] == 0) {
            $data['offer_percent'] = '0';
        } else {
            $data['offer_percent'] = round(($data['offer_total'] / $data['today_sale']) * 100);
        }


        $lastStartDate = date('Y-m-d 00:00:00', strtotime('last week monday'));
        $lastEndDate = date('Y-m-d 23:59:59', strtotime('last week sunday'));

        //上周有销售的国家总数
        $country_count = DB::table('offer_logs AS log')
            ->where('log.status', 2)
            ->where('log.created_at', '>', $lastStartDate)
            ->where('log.created_at', '<=', $lastEndDate)
            ->leftJoin('geos AS g', 'log.country_id', '=', 'g.id')
            ->leftJoin('offers AS o', 'log.offer_id', '=', 'o.id')
//            ->whereRaw($whereRole)
            ->where($offer_admin1)

            ->select(DB::raw('sum(log.revenue) as country_total'), 'log.country_id', 'country')
            ->groupBy('country_id')
            ->orderByDesc('country_total')
            ->get()->count();


        //上周有销售的offer总数
        $offer_last_week = DB::table('offer_logs AS log')
            ->where('log.status', 2)
            ->where('log.created_at', '>', $lastStartDate)
            ->where('log.created_at', '<=', $lastEndDate)
//            ->whereRaw($whereRole)

            ->where($offer_admin1)


            ->leftJoin('offers AS o', 'log.offer_id', '=', 'o.id')
            ->select(DB::raw('count((log.offer_id)) as offer_count'), 'log.offer_id')
            ->groupBy('log.offer_id')
            ->orderByDesc('offer_count')
            ->get()->toArray();
        $offer_last_week_count = count($offer_last_week);




        //上周有销售的offer占比
        $offer_last_week = DB::table('offer_logs AS log')
            ->where('log.status', 2)
            ->where('log.created_at', '>', $lastStartDate)
            ->where('log.created_at', '<=', $lastEndDate)
//            ->whereRaw($whereRole)

            ->where($offer_admin1)


            ->leftJoin('offers AS o', 'log.offer_id', '=', 'o.id')
            ->select(DB::raw('sum(log.revenue) as offer_total'), 'log.offer_id', 'o.offer_name')
            ->groupBy('log.offer_id')
            ->orderByDesc('offer_total')
            ->limit(3)
            ->get()->toArray();

        $data['last_week_sale'] = OfferLog::where('status', 2)->where('created_at', '>', $lastStartDate)->where('created_at', '<=', $lastEndDate)->sum('revenue');


        if (!empty($offer_last_week)) {

            foreach ($offer_last_week as $key => $value) {
                $country_list = OfferLog::where('offer_id', $value->offer_id)
                    ->leftJoin('offers AS o', 'offer_logs.offer_id', '=', 'o.id')

//                    ->whereRaw($whereRole)
                    ->where($offer_admin)

                    ->select(DB::raw('sum(offer_logs.revenue) as offer_total'), 'offer_logs.country_id')
                    ->groupBy('offer_logs.country_id')
                    ->orderByDesc('offer_total')
                    ->limit(3)
                    ->get()->toArray();


                if (!empty($country_list)) {
                    $country_name_list = '';
                    foreach ($country_list as $x => $y) {
                        $country_name = Geos::where('id', $y['country_id'])->value('country');
                        $country_name_list .= $country_name . ',';
                    }
                }

                $offer_last_week[$key]->country_id = $country_list;
                $offer_last_week[$key]->country_list = trim($country_name_list, ',');

                if ($data['last_week_sale'] == 0) {
                    $offer_last_week[$key]->last_week_percent = 0;
                } else {
                    $offer_last_week[$key]->last_week_percent = round($value->offer_total / $data['last_week_sale'] * 100, 2);

                }
            }
        }

      $message_list = Message::all()->toArray();

//        print_r($message_list);exit;

        $data['message_list'] = $message_list;
        $data['offer_last_week'] = $offer_last_week;

//        print_r("<pre/>");
//        print_r($data);exit;
//        echo 123;exit;

        return $content
            ->title('Dashboard')
//            ->description('Description...')
            ->body(view('admin.home.dashboard', ['data' => $data]));


//        return $content->title("Index V2")->view("admin/home/index-v2", compact('data'));


    }


    public function query(Request $Request)
    {

        $data = Geos::limit(10)->get()->toArray();
        foreach ($data as $key => $value) {
            $data[$key]['id'] = $value['country_ios_code'];
        }

        $data['levels'][0]['locations'] = $data;
        return $data;
    }

    // search data
    public function search(Request $request)
    {

        $currentUser = auth()->user(); // 获取当前登录用户的模型对象
        $admin_id = $currentUser->id; // 输出当前用户名称
        $roles = $currentUser->roles; // 获取当前用户的角色集合

        $role_name = $currentUser->roles[0]->name;

        $role = '';
        foreach ($roles as $role) {
            $role = $role->id;
//            $role_name = $role->name;


        }

        if(!Admin::user()->isAdministrator() && $role_name!=='manage'){
            $whereRole = "FIND_IN_SET($role, o.admin_roles_id)";

            $offer_admin = [['offer_logs.admin_id','=',$admin_id]];
            $offer_admin1 = [['log.admin_id','=',$admin_id]];


        }else{

            $whereRole = '1=1';
            $offer_admin = [['offer_logs.admin_id','<>',0]];
            $offer_admin1 = [['log.admin_id','<>',0]];
        }




        $step = $request->input("step");

        $total_offer_revenue = OfferLog::where('offer_logs.status', 2)
            ->leftJoin('offers AS o', 'offer_logs.offer_id', '=', 'o.id')

            ->where('offer_logs.created_at', '>', date('2022-01-01 00:00:00'))
            ->where('offer_logs.created_at', '<=', date('Y-m-t 23:59:59'))
//            ->whereRaw($whereRole)

            ->where($offer_admin)
            ->sum('offer_logs.revenue');

        $data = [];
        // full_dashboard_data
        if ($step == 'full_dashboard_data') {

            $data = [];
            $data['all_count'] = OfferLog::where('offer_logs.status', 2)
                ->leftJoin('offers AS o', 'offer_logs.offer_id', '=', 'o.id')
//                ->whereRaw($whereRole)

//                ->whereRaw($whereRole)
                ->where($offer_admin)

                ->groupBy('offer_logs.offer_id')
                ->count();

            $all_peyout_price = OfferLog::where('offer_logs.status', 2)
                ->leftJoin('offers AS o', 'offer_logs.offer_id', '=', 'o.id')
//                ->whereRaw($whereRole)

                //                ->whereRaw("FIND_IN_SET($role, o.admin_roles_id)")
                ->where($offer_admin)

                ->sum('offer_logs.revenue');
            $data['all_peyout_price'] = round($all_peyout_price, 2);


            $data['day_peyout'] = OfferLog::where('offer_logs.status', 2)
                ->leftJoin('offers AS o', 'offer_logs.offer_id', '=', 'o.id')
                ->where($offer_admin)

                //                ->whereRaw("FIND_IN_SET($role, o.admin_roles_id)")

//                ->whereRaw($whereRole)

                ->where('offer_logs.created_at', '>', date('Y-m-d 00:00:00'))
                ->where('offer_logs.created_at', '<=', date('Y-m-d 23:59:59'))
                ->groupBy('offer_logs.offer_id')->count();

            $day_peyout_price = OfferLog::where('offer_logs.status', 2)
                ->leftJoin('offers AS o', 'offer_logs.offer_id', '=', 'o.id')
//                ->whereRaw("FIND_IN_SET($role, o.admin_roles_id)")
                ->where($offer_admin)

//                ->whereRaw($whereRole)

                ->where('offer_logs.created_at', '>', date('Y-m-d 00:00:00'))
                ->where('offer_logs.created_at', '<=', date('Y-m-d 23:59:59'))
                ->sum('offer_logs.revenue');


            $data['day_peyout_price'] = round($day_peyout_price, 2);
            $data['message'] = false;
            $data['month_peyout_count'] = OfferLog::where('offer_logs.status', 2)
                ->leftJoin('offers AS o', 'offer_logs.offer_id', '=', 'o.id')
//                ->whereRaw("FIND_IN_SET($role, o.admin_roles_id)")

//                ->whereRaw($whereRole)
                ->where($offer_admin)


                ->where('offer_logs.created_at', '>', date('Y-m-1 00:00:00'))
                ->where('offer_logs.created_at', '<=', date('Y-m-t 23:59:59'))
                ->groupBy('offer_logs.offer_id')->count();

            $month_peyout_price = OfferLog::where('offer_logs.status', 2)
                ->leftJoin('offers AS o', 'offer_logs.offer_id', '=', 'o.id')
//                ->whereRaw("FIND_IN_SET($role, o.admin_roles_id)")
//                ->whereRaw($whereRole)
                ->where($offer_admin)


                ->where('offer_logs.created_at', '>', date('Y-m-1 00:00:00'))
                ->where('offer_logs.created_at', '<=', date('Y-m-t 23:59:59'))
                ->sum('offer_logs.revenue');
            $data['month_peyout_price'] = round($month_peyout_price, 2);

        }
        //
        if ($step == 'dashboard_week_jvector') {
            $geos = [];
            $offers = [];
            $top_3_country_offers = [];


            $percentags = [];
            $positions = [];
            $values = [];
            $geos['percentags'] = $percentags;
            $geos['positions'] = $positions;
            $geos['values'] = $values;
            $data['geos'] = $geos;

            $array_counts = [];
            $array_percent_done = [];
            $offers['array_counts'] = $array_counts;
            $offers['array_percent_done'] = $array_percent_done;


            $data['offers'] = $offers;

            $ClearView = [];
            $MaxPhone = [];
            $TVShareMax = [];

            $top_3_country_offers['ClearView'] = $ClearView;
            $top_3_country_offers['MaxPhone'] = $MaxPhone;
            $top_3_country_offers['TVShareMax'] = $TVShareMax;
            $data['top_3_country_offers'] = $top_3_country_offers;
        }

        // dashboard_geos
        if ($step == 'dashboard_geos') {


            //前五个国家销售
            $country_sale = DB::table('offer_logs AS log')


                ->where('log.status', 2)
                ->where('log.created_at', '>', date('2022-01-01 00:00:00'))
                ->where('log.created_at', '<=', date('Y-m-t 23:59:59'))
                ->leftJoin('geos AS g', 'log.country_id', '=', 'g.id')
                ->leftJoin('offers AS o', 'log.offer_id', '=', 'o.id')
//                ->whereRaw("FIND_IN_SET($role, o.admin_roles_id)")
//                ->whereRaw($whereRole)
                ->where($offer_admin1)


                ->select(DB::raw('sum(log.revenue) as country_sale'), 'log.country_id', 'g.country')
                ->groupBy('country_id')
                ->orderByDesc('country_sale')
                ->limit(5)
                ->get()
                ->toArray();


            if (!empty($country_sale)) {
                $country_info = [];
                foreach ($country_sale as $key => $value) {
                    $country_info[$key]['country'] = $value->country;
                    $country_info[$key]['country_sale'] = round($value->country_sale);
                    if ($value->country_sale !== 0) {
                        $country_info[$key]['country_pencent'] = round($value->country_sale / $total_offer_revenue * 100, 2);
                    } else {
                        $country_info[$key]['country_pencent'] = 0;
                    }
                }

            } else {
                $country_info = [];
            }

            $top5country_percent = array_column($country_info, 'country_pencent');
            $top5country_sale = array_column($country_info, 'country_sale');

            $data = [
                'percentage' => $top5country_percent,
                'positions' => [
                    '0' => ['latLng' => [40.2, -107.7], 'name' => 'United States'],
                    '1' => ['latLng' => [30.9, 35.2], 'name' => 'Israel'],
                    '2' => ['latLng' => [60.2, -107.7], 'name' => 'Canada'],
                    '3' => ['latLng' => [50.8, 10.1], 'name' => 'Germany'],
                    '4' => ['latLng' => [54.3, -1.9], 'name' => '1Germany']
                ],
                'values' => $top5country_sale
            ];

        }


        if ($step == 'dashboard_offers') {


            //前五个offer销售
            $offer_sale = DB::table('offer_logs AS log')
                ->where('log.status', 2)
                ->where('log.created_at', '>', date('2022-01-01 00:00:00'))
                ->where('log.created_at', '<=', date('Y-m-d 23:59:59'))
                ->leftJoin('offers AS o', 'log.offer_id', '=', 'o.id')
//                ->whereRaw("FIND_IN_SET($role, o.admin_roles_id)")
//                ->whereRaw($whereRole)
                ->where($offer_admin1)

                ->select(DB::raw('sum(log.revenue) as offer_sale'), 'log.offer_id', 'o.short_name as offer_name')
                ->groupBy('log.offer_id')
                ->orderByDesc('offer_sale')
                ->limit(5)
                ->get()
                ->toArray();


            if (!empty($offer_sale)) {
                $offer_info = [];
                foreach ($offer_sale as $key => $value) {
                    $offer_info[$key]['offer_name'] = $value->offer_name;
                    $offer_info[$key]['offer_sale'] = round($value->offer_sale);

                    if ($value->offer_sale !== 0) {
                        $offer_info[$key]['offer_pencent'] = round($value->offer_sale / $total_offer_revenue * 100, 2);
                    } else {
                        $offer_info[$key]['offer_pencent'] = 0;
                    }
                }
            } else {
                $offer_info = [];
            }

            $top5offer_percent = array_column($offer_info, 'offer_pencent');
            $top5offer_count = array_column($offer_info, 'offer_sale');
            $top5offer_name = array_column($offer_info, 'offer_name');


//            print_r($top5offer_percent);exit;

            if(empty($top5offer_percent)){
                $top5offer_percent = '';
            }


            $data = [
                'array_percent_done' => [
                    'vals' => $top5offer_percent,
                    'names' => $top5offer_name,
                ],

                'array_counts' => $top5offer_count
            ];
        }


        // last_sales
        if ($step == 'last_sales') {

            //最近五个销售offer
            $offer_info = DB::table('offer_logs AS log')->where('log.status', 2)
                ->leftJoin('offers AS o', 'log.offer_id', '=', 'o.id')
//                ->whereRaw("FIND_IN_SET($role, o.admin_roles_id)")

//                ->whereRaw($whereRole)

                ->where($offer_admin1)


                ->select('log.created_at', 'o.offer_name', 'log.revenue')
                ->orderByDesc('created_at')
                ->limit(5)
                ->get()->toArray();

            $data = '';
            foreach ($offer_info as $key => $value) {

                $data .= '<hr class="teble_hr" style="width:calc(100% - 20px);">
                        <div class="forst_row_table table_content_top bold text-success" style="width:18%; display: inline-block;">
                            ' . date('d-m-Y', strtotime($value->created_at)) . '</div><div class="forst_row_table table_content_top bold text-success" style="width:18%; display: inline-block;">
                             ' . date('H:i:s', strtotime($value->created_at)) . '</div>
                        <div class="second_row_table table_content_top" style="width:44%; display: inline-block;">
                             ' . $value->offer_name . '</div>
                        <div class="last_row_table table_content_top bold text-success" style="width:8%; display: inline-block; text-align: center;">
                             $ ' . round($value->revenue, 2) . '</div>';
            }
        }

        return response()->json($data);
    }

    public function indexV2(Content $content, Request $request)
    {

        $data = [];
        return $content->title("Index V2")->view("admin/home/index-v2", compact('data'));
    }

    public function reporting(Request $request)
    {


        $data = [];
        $data['mapheight'] = "900";
        $data['mapwidth'] = "1400";
        $data['maxscale'] = "8";
        $data['minimap'] = "true";
        $data['categories'] = [];
        $data['sidebar'] = "true";
        $levels = [];
        $levels[0]['id'] = "states";
        $levels[0]['map'] = "/images/map.png";
        $levels[0]['minimap'] = "images/states/us-small.jpg";
        $levels[0]['title'] = "states";
        $locations = [];

//        $locations[] = [
//            'action'=> "tooltip",
//            'description'=> "tooltip",
//            'id'=> "au",
//            'pin'=> "hidden",
//            'pin'=> "hidden",
//            'select_detect'=> "Austria",
//            'title'=> "Austria",
//            'x'=> "0.5218",
//            'y'=> "0.3851",
//        ];

        $locations = Locations::get()->toArray();

        $result = [];
        foreach ($locations as $key => $value) {
            $result[$key]['action'] = $value['action'];
            $result[$key]['description'] = $value['description'];
            $result[$key]['id'] = $value['type_id'];
            $result[$key]['pin'] = $value['pin'];
            $result[$key]['select_detect'] = $value['select_detect'];
            $result[$key]['title'] = $value['title'];
            $result[$key]['x'] = $value['x'];
            $result[$key]['y'] = $value['y'];
        }


//        print_r($locations);exit;
        $levels[0]['locations'] = $result;
        $data['levels'] = $levels;

//        print_r("<pre/>");
//        print_r($data);exit;

        return response()->json($data);
    }


    public function dashboard(Request $request)
    {

        $data = [];
        $geos = [];
        $offers = [];


        $currentUser = auth()->user(); // 获取当前登录用户的模型对象
        $admin_id = $currentUser->id; // 输出当前用户名称
        $roles = $currentUser->roles; // 获取当前用户的角色集合

        $role_name = $currentUser->roles[0]->name;

        $role = '';
        foreach ($roles as $role) {
            $role = $role->id;
//            $role_name = $role->name;


        }

        if(!Admin::user()->isAdministrator() && $role_name!=='manage'){
            $whereRole = "FIND_IN_SET($role, o.admin_roles_id)";

            $offer_admin = [['offer_logs.admin_id','=',$admin_id]];
            $offer_admin1 = [['log.admin_id','=',$admin_id]];


        }else{

            $whereRole = '1=1';
            $offer_admin = [['offer_logs.admin_id','<>',0]];
            $offer_admin1 = [['log.admin_id','<>',0]];
        }

        //全部销量
        $total_count = DB::table('offer_logs as log')

            ->leftJoin('offers AS o', 'log.offer_id', '=', 'o.id')
//            ->whereRaw("FIND_IN_SET($role, o.admin_roles_id)")
//            ->whereRaw($whereRole)
            ->where($offer_admin1)
            ->where('log.created_at', '>', date('2022-01-01 00:00:00'))
            ->where('log.created_at', '<=', date('Y-m-t 23:59:59'))
            ->where('status', 2)->count();


        $total_country_count = DB::table('offer_logs as log')
            ->leftJoin('offers AS o', 'log.offer_id', '=', 'o.id')
//            ->whereRaw("FIND_IN_SET($role, o.admin_roles_id)")
//            ->whereRaw($whereRole)
            ->where($offer_admin1)


            ->where('log.status', 2)
            ->where('log.created_at', '>', date('2022-01-01 00:00:00'))
            ->where('log.created_at', '<=', date('Y-m-t 23:59:59'))
            ->select(DB::raw('count(log.id) as offer_count'), 'log.country_id')
            ->groupBy('log.country_id')
            ->orderByDesc('offer_count')
            ->get()
            ->toArray();


        if (!empty($total_country_count)) {
            foreach ($total_country_count as $key => $value) {
                $total_country_count[$key]->percent = round($value->offer_count / $total_count * 100, 2);
            }
            $country_percent = array_column($total_country_count, 'offer_count');
        } else {
            $country_percent = [];
        }


        $geos = [
            'percentage' => $country_percent,

            'positions' => [
                '0' => ['latLng' => [40.2, -107.7], 'name' => 'United States'],
                '1' => ['latLng' => [30.9, 35.2], 'name' => 'Israel'],
                '2' => ['latLng' => [60.2, -107.7], 'name' => 'Canada'],
                '3' => ['latLng' => [50.8, 10.1], 'name' => 'Germany'],
                '4' => ['latLng' => [54.3, -1.9], 'name' => 'United Kingdom'],
                '5' => ['latLng' => [-26.2, 137.7], 'name' => 'Australia'],
                '6' => ['latLng' => [46.8, 2.9], 'name' => 'France'],
                '7' => ['latLng' => [-38.1, -65.4], 'name' => 'Argentina'],
                '8' => ['latLng' => [46.9, 7.9], 'name' => 'Switzerland'],
                '9' => ['latLng' => [47.2, 19.2], 'name' => 'Hungary'],
                '10' => ['latLng' => [-42.2, 172.7], 'name' => 'New Zealand'],
                '11' => ['latLng' => [-19.62, 46.68], 'name' => 'Madagascar'],
                '12' => ['latLng' => [18.4, -66.6], 'name' => 'Puerto Rico'],
                '13' => ['latLng' => [9.9, -83.8], 'name' => 'Costa Rica'],
                '14' => ['latLng' => [4.1, -74.1], 'name' => 'Colombia'],
                '15' => ['latLng' => [45.4, 16.2], 'name' => 'Croatia'],
                '16' => ['latLng' => [45.7, 24.5], 'name' => 'Romania'],
                '17' => ['latLng' => [-21.62, 54.18], 'name' => 'Reunion'],
                '18' => ['latLng' => [40.2, -4.2], 'name' => 'Spain'],
                '19' => ['latLng' => [49.85, 5.9], 'name' => 'Luxembourg'],
                '20' => ['latLng' => [16.4, -61.6], 'name' => 'Antigua and Barbuda'],
                '21' => ['latLng' => [52.42, 5.58], 'name' => 'Belgium'],
                '22' => ['latLng' => [14, -61.1], 'name' => 'Martinique']
            ],


            'values' => [33, 16, 11, 5, 5, 4, 3, 3, 2, 2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1]
        ];


        $total_offer_count = DB::table('offer_logs as log')
            ->leftJoin('offers AS o', 'log.offer_id', '=', 'o.id')
//            ->whereRaw("FIND_IN_SET($role, o.admin_roles_id)")
//            ->whereRaw($whereRole)
            ->where($offer_admin1)


            ->where('log.status', 2)
            ->where('log.created_at', '>', date('2022-01-01 00:00:00'))
            ->where('log.created_at', '<=', date('Y-m-t 23:59:59'))
            ->select(DB::raw('count(log.id) as offer_count'), 'log.offer_id','o.offer_name','o.short_name')
            ->groupBy('log.offer_id')
            ->orderByDesc('offer_count')
            ->get()
            ->toArray();

//        print_r($total_offer_count);exit;

        if (!empty($total_offer_count)) {

            foreach ($total_offer_count as $key => $value) {

                if ($total_count == 0) {
                    $total_offer_count[$key]->percent = 0;
                } else {
                    $total_offer_count[$key]->percent = round($value->offer_count / $total_count * 100, 2);
                }
            }

//            print_r($total_offer_count);exit;

            $array_counts = array_column($total_offer_count, 'offer_count');
            $short_name = array_column($total_offer_count, 'short_name');
            $offer_name = array_column($total_offer_count, 'offer_name');
            $offer_percent = array_column($total_offer_count, 'percent');

            $offer_ids = array_column($total_offer_count, 'offer_id');

        } else {
            $array_counts = [];
            $short_name = [];
            $offer_name = [];
            $offer_percent = [];
        }

//        print_r($offer_ids);exit;



        $offers['array_counts'] = $array_counts;
        $offers['array_percent_done'] = [
            'db_names' => $short_name,

            'link_preview' => ['https://popularhitech.com/intl/', 'https://popularhitech.com/intl/', 'https://popularhitech.com/intl/', 'https://popularhitech.com/intl/', 'https://popularhitech.com/intl/', 'https://popularhitech.com/intl/', 'https://popularhitech.com/intl/', 'https://popularhitech.com/intl/', 'https://popularhitech.com/intl/', 'https://popularhitech.com/intl/', 'https://popularhitech.com/intl/', 'https://popularhitech.com/intl/', 'https://popularhitech.com/intl/', 'https://popularhitech.com/intl/', 'https://popularhitech.com/intl/', 'https://popularhitech.com/intl/', 'https://popularhitech.com/intl/', 'https://popularhitech.com/intl/', 'https://popularhitech.com/intl/', 'https://popularhitech.com/intl/', 'https://popularhitech.com/intl/', 'https://popularhitech.com/intl/', 'https://popularhitech.com/intl/', 'https://popularhitech.com/intl/', 'https://popularhitech.com/intl/'],


            'long_names' => $offer_name,
            'names' => $short_name,
            'vals' => $offer_percent,
        ];


        if(!empty($offer_ids)) {


            $short_name_list = array_slice($offer_ids, 0, 3);
            $top_3_country_offers = [];
            foreach ($short_name_list as $key => $value) {

//            print_r($value);exit;

                $total_country_list = DB::table('offer_logs as log')
                    ->leftJoin('geos AS g', 'log.country_id', '=', 'g.id')
                    ->leftJoin('offers AS o', 'log.offer_id', '=', 'o.id')
//                    ->whereRaw("FIND_IN_SET($role, o.admin_roles_id)")
//                    ->whereRaw($whereRole)
                    ->where($offer_admin1)


                    ->where('log.offer_id', $value)
                    ->where('log.status', 2)
                    ->where('log.created_at', '>', date('2022-01-01 00:00:00'))
                    ->where('log.created_at', '<=', date('Y-m-t 23:59:59'))
                    ->select(DB::raw('count(log.id) as offer_count'), 'g.country')
                    ->groupBy('g.country')
                    ->orderByDesc('offer_count')
                    ->limit(3)
                    ->get()
                    ->toArray();


                $offer_info = DB::table('offers')->where('id', $value)->get();

                if (!empty($offer_info)) {
                    $offer_info = $offer_info->first();
                    $short_name = $offer_info->short_name;
                } else {
                    $short_name = '';
                }


                if (!empty($total_country_list)) {
                    $top_3_country_offers[$short_name]['names'] = array_column($total_country_list, 'country');
                } else {
                    $top_3_country_offers[$short_name]['names'] = '';
                }

            }
        }else{

            $top_3_country_offers = [];
        }


//        print_r($top_3_country_offers);exit;

        $data['geos'] = $geos;
        $data['offers'] = $offers;
        $data['top_3_country_offers'] = $top_3_country_offers;

        return response()->json($data);
    }

}
