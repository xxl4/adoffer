<?php

namespace App\Admin\Controllers;

use App\Models\Geos;
use App\Models\Locations;
use App\Models\OfferLog;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Widgets\Box;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class HomeController extends Controller
{


    public function index(Content $content)
    {

        $data = [];
        //总销量
        $data['total_sale'] = OfferLog::where('status', 2)->sum('revenue');
        //当天的销量
        $data['today_sale'] = OfferLog::where('status', 2)->where('created_at', '>', date('Y-m-d 00:00:00'))->where('created_at', '<=', date('Y-m-d 23:59:59'))->sum('revenue');
        //当月的销量
        $data['month_sale'] = OfferLog::where('status', 2)->where('created_at', '>', date('Y-m-1 00:00:00'))->where('created_at', '<=', date('Y-m-t 23:59:59'))->sum('revenue');
        //最近五个销售offer
        $data['offer_info'] = DB::table('offer_logs AS log')->where('log.status', 2)
            ->leftJoin('offers AS o', 'log.offer_id', '=', 'o.id')
            ->select('log.created_at', 'o.offer_name', 'log.revenue')
            ->orderByDesc('created_at')
            ->limit(5)
            ->get()->toArray();

        //当天销量最多的国家数组以及占比百分比
        $country_top = DB::table('offer_logs AS log')->where('log.status', 2)->where('log.created_at', '>', date('Y-m-d 00:00:00'))->where('log.created_at', '<=', date('Y-m-d 23:59:59'))
            ->leftJoin('geos AS g', 'log.country_id', '=', 'g.id')
            ->select(DB::raw('sum(log.revenue) as country_total'), 'log.country_id', 'country')
            ->groupBy('country_id')
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
        $offer_top = DB::table('offer_logs AS log')->where('log.status', 2)->where('log.created_at', '>', date('2023-01-01 00:00:00'))->where('log.created_at', '<=', date('Y-m-d 23:59:59'))
            ->leftJoin('offers AS o', 'log.offer_id', '=', 'o.id')
            ->select(DB::raw('sum(log.revenue) as offer_total'), 'log.offer_id', 'o.offer_name')
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
        $country_count = DB::table('offer_logs AS log')->where('log.status', 2)->where('log.created_at', '>', $lastStartDate)->where('log.created_at', '<=', $lastEndDate)
            ->leftJoin('geos AS g', 'log.country_id', '=', 'g.id')
            ->select(DB::raw('sum(log.revenue) as country_total'), 'log.country_id', 'country')
            ->groupBy('country_id')
            ->orderByDesc('country_total')
            ->get()->count();


        //上周有销售的offer总数
        $offer_last_week = DB::table('offer_logs AS log')->where('log.status', 2)->where('log.created_at', '>', $lastStartDate)->where('log.created_at', '<=', $lastEndDate)
//            ->leftJoin('offers AS o', 'log.offer_id', '=', 'o.id')
            ->select(DB::raw('count((log.offer_id)) as offer_count'), 'log.offer_id')
            ->groupBy('log.offer_id')
            ->orderByDesc('offer_count')
            ->get()->toArray();
        $offer_last_week_count = count($offer_last_week);


        //上周有销售的offer占比
        $offer_last_week = DB::table('offer_logs AS log')->where('log.status', 2)->where('log.created_at', '>', $lastStartDate)->where('log.created_at', '<=', $lastEndDate)
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
                    ->select(DB::raw('sum(revenue) as offer_total'), 'country_id')
                    ->groupBy('country_id')->orderByDesc('offer_total')
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

        $data['offer_last_week'] = $offer_last_week;

//        print_r("<pre/>");
//        print_r($offer_last_week);exit;

        return $content
//            ->title('Dashboard')
//            ->description('Description...')
            ->body(new Box('', view('admin.home.dashboard', ['data' => $data])));


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
        $step = $request->input("step");
        $data = [];
        // full_dashboard_data
        if ($step == 'full_dashboard_data') {

        $data = [];
        $data['all_count'] = OfferLog::where('status', 2)->groupBy('offer_id')->count();
        $data['all_peyout_price'] = OfferLog::where('status', 2)->sum('revenue');

        $data['day_peyout'] = OfferLog::where('status', 2)->where('created_at', '>', date('Y-m-d 00:00:00'))->where('created_at', '<=', date('Y-m-d 23:59:59'))->groupBy('offer_id')->count();
        $data['day_peyout_price'] = OfferLog::where('status', 2)->where('created_at', '>', date('Y-m-d 00:00:00'))->where('created_at', '<=', date('Y-m-d 23:59:59'))->sum('revenue');
        $data['message'] = false;
        $data['month_peyout_count'] = OfferLog::where('status', 2)->where('created_at', '>', date('Y-m-1 00:00:00'))->where('created_at', '<=', date('Y-m-t 23:59:59'))->groupBy('offer_id')->count();
        $data['month_peyout_price'] =OfferLog::where('status', 2)->where('created_at', '>', date('Y-m-1 00:00:00'))->where('created_at', '<=', date('Y-m-t 23:59:59'))->sum('revenue');


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
            $country_sale = DB::table('offer_logs AS log')->where('log.status', 2)->where('log.created_at', '>', date('2022-01-01 00:00:00'))->where('log.created_at', '<=', date('Y-m-t 23:59:59'))
                ->leftJoin('geos AS g', 'log.country_id', '=', 'g.id')
                ->select(DB::raw('sum(log.revenue) as country_sale'), 'log.country_id', 'country')
                ->groupBy('country_id')
                ->orderByDesc('country_sale')
                ->limit(5)
                ->get()
                ->toArray();

            $sale_list = array_column($country_sale, 'country_sale');
            $country_sale_top5 = array_sum($sale_list);

            //前五个国家销售总和
          $total_country_sale = DB::table('offer_logs AS log')->where('log.status', 2)->where('log.created_at', '>', date('2022-01-01 00:00:00'))->where('log.created_at', '<=', date('Y-m-t 23:59:59'))->sum('revenue');

            //前五个国家销售占比
          if($total_country_sale==0){
              $top5country_percent = 0;
          }else{
              $top5country_percent = round($country_sale_top5/$total_country_sale,2);
          }


            //前五个offer销售
            $offer_sale = DB::table('offer_logs AS log')->where('log.status', 2)->where('log.created_at', '>', date('2022-01-01 00:00:00'))->where('log.created_at', '<=', date('Y-m-d 23:59:59'))
                ->leftJoin('offers AS o', 'log.offer_id', '=', 'o.id')
                ->select(DB::raw('sum(log.revenue) as offer_sale'), 'log.offer_id', 'o.offer_name')
                ->groupBy('log.offer_id')
                ->orderByDesc('offer_sale')
                ->limit(5)
                ->get()
                ->toArray();


            $offer_sale_list = array_column($offer_sale, 'offer_sale');
            $offer_sale_top5 = array_sum($offer_sale_list);


            //前五个offer销售占比
            if($offer_sale_top5==0){
                $top5offer_percent = 0;
            }else{
                $top5offer_percent = round($offer_sale_top5/$total_country_sale,2);
            }



            //前五个offer销售总次数
            $total_offer_count = DB::table('offer_logs')
                ->where('status', 2)
                ->where('created_at', '>', date('2022-01-01 00:00:00'))->where('created_at', '<=', date('Y-m-t 23:59:59'))
                ->select(DB::raw('count(id) as offer_count'), 'offer_id')
                ->groupBy('offer_id')
                ->orderByDesc('offer_count')
                ->limit(5)
                ->get()
                ->toArray();

            $offer_count_list = array_column($total_offer_count, 'offer_count');
            $offer_sale_top5count = array_sum($offer_count_list);


            $data['top5country_percent']=$top5country_percent;
            $data['top5country_count']=$country_sale_top5;
            $data['top5offer_percent']=$top5offer_percent;
            $data['top5offer_count']=$offer_sale_top5count;

            $data = [
                'percentage'=>[33.673469387755105, 16.3265306122449, 11.224489795918368, 5.1020408163265305, 5.1020408163265305],
                'positions'=>[ '0' => ['latLng' => [40.2, -107.7], 'name' => 'United States'], '1' => ['latLng' => [30.9, 35.2], 'name' => 'Israel'], '2' => ['latLng' => [60.2, -107.7], 'name' => 'Canada'], '3' => ['latLng' => [50.8, 10.1], 'name' => 'Germany'], '4' => ['latLng' => [54.3, -1.9]]],
                'values'=>[33, 16, 11, 5, 5]
            ];
        }

        // last_sales
        if ($step == 'last_sales') {

            //最近五个销售offer
            $offer_info = DB::table('offer_logs AS log')->where('log.status', 2)
                ->leftJoin('offers AS o', 'log.offer_id', '=', 'o.id')
                ->select('log.created_at', 'o.offer_name', 'log.revenue')
                ->orderByDesc('created_at')
                ->limit(5)
                ->get()->toArray();


            $data = '';
            foreach ($offer_info as $key=>$value){

                $data .= '<hr class="teble_hr" style="width:calc(100% - 20px);">
                        <div class="forst_row_table table_content_top bold text-success" style="width:18%; display: inline-block;">
                            '.date('d-m-Y',strtotime($value->created_at)).'</div><div class="forst_row_table table_content_top bold text-success" style="width:18%; display: inline-block;">
                             '.date('H:i:s',strtotime($value->created_at)).'</div>
                        <div class="second_row_table table_content_top" style="width:44%; display: inline-block;">
                             '.$value->offer_name.'</div>
                        <div class="last_row_table table_content_top bold text-success" style="width:8%; display: inline-block; text-align: center;">
                             $ '.$value->revenue.'</div>';

            }


        }



        return response()->json($data);
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
        $levels[0]['map'] = "images/map.png";
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



        $geos = [
            'percentage'=>[33.673469387755105, 16.3265306122449, 11.224489795918368, 5.1020408163265305, 5.1020408163265305, 4.081632653061225, 3.061224489795918, 3.061224489795918, 2.0408163265306123, 2.0408163265306123, 1.0204081632653061, 1.0204081632653061, 1.0204081632653061, 1.0204081632653061, 1.0204081632653061, 1.0204081632653061, 1.0204081632653061, 1.0204081632653061, 1.0204081632653061, 1.0204081632653061, 1.0204081632653061, 1.0204081632653061, 1.0204081632653061],

            'positions'=>[ '0' => ['latLng' => [40.2, -107.7], 'name' => 'United States'], '1' => ['latLng' => [30.9, 35.2], 'name' => 'Israel'], '2' => ['latLng' => [60.2, -107.7], 'name' => 'Canada'], '3' => ['latLng' => [50.8, 10.1], 'name' => 'Germany'], '4' => ['latLng' => [54.3, -1.9], 'name' => 'United Kingdom'], '5' => ['latLng' => [-26.2, 137.7], 'name' => 'Australia'], '6' => ['latLng' => [46.8, 2.9], 'name' => 'France'], '7' => ['latLng' =>[-38.1, -65.4], 'name' => 'Argentina'], '8' => ['latLng' =>[46.9, 7.9], 'name' => 'Switzerland'], '9' => ['latLng' => [47.2, 19.2], 'name' => 'Hungary'], '10' => ['latLng' =>[-42.2, 172.7], 'name' => 'New Zealand'], '11' => ['latLng' =>[-19.62, 46.68], 'name' => 'Madagascar'], '12' => ['latLng' => [18.4, -66.6], 'name' => 'Puerto Rico'], '13' => ['latLng' =>[9.9, -83.8], 'name' => 'Costa Rica'], '14' => ['latLng' => [4.1, -74.1], 'name' => 'Colombia'], '15' => ['latLng' => [45.4, 16.2], 'name' => 'Croatia'], '16' => ['latLng' => [45.7, 24.5], 'name' => 'Romania'], '17' => ['latLng' => [-21.62, 54.18], 'name' => 'Reunion'], '18' => ['latLng' => [40.2, -4.2], 'name' => 'Spain'], '19' => ['latLng' => [49.85, 5.9], 'name' => 'Luxembourg'], '20' => ['latLng' => [16.4, -61.6], 'name' => 'Antigua and Barbuda'], '21' => ['latLng' => [52.42, 5.58], 'name' => 'Belgium'], '22' => ['latLng' => [14, -61.1], 'name' => 'Martinique']],
            'values'=>[33, 16, 11, 5, 5, 4, 3, 3, 2, 2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1,1]
        ];


        $offers['array_counts'] = [33, 15, 14, 4, 3, 3, 3, 3, 2, 2, 2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1];
        $offers['array_percent_done'] = [
            'db_names' => ["TVShareMax", "MaxPhone", "ClearView", "PicoBuds Pro", "WIFI UltraBoost", "RealAction Pro", "VacuumGo Pro", "ScratchUndo Pro", "DroneX Pro", "LiveGuard360", "ZoomShot Pro", "TranslateTrek", "BarXStop", "BloodPressureX", "LuxBra", "GoClean Robot", "GX SmartWatch", "ProperFocus", "CoolEdge", "Tactic AIR Drone", "TwilightMist", "AutoMix", "WinterSecret Pro", "SilentSnore", "XPRO Drone",],

            'link_preview' => ['https://popularhitech.com/intl/', 'https://popularhitech.com/intl/', 'https://popularhitech.com/intl/', 'https://popularhitech.com/intl/', 'https://popularhitech.com/intl/', 'https://popularhitech.com/intl/', 'https://popularhitech.com/intl/', 'https://popularhitech.com/intl/', 'https://popularhitech.com/intl/', 'https://popularhitech.com/intl/', 'https://popularhitech.com/intl/', 'https://popularhitech.com/intl/', 'https://popularhitech.com/intl/', 'https://popularhitech.com/intl/', 'https://popularhitech.com/intl/', 'https://popularhitech.com/intl/', 'https://popularhitech.com/intl/', 'https://popularhitech.com/intl/', 'https://popularhitech.com/intl/', 'https://popularhitech.com/intl/', 'https://popularhitech.com/intl/', 'https://popularhitech.com/intl/', 'https://popularhitech.com/intl/', 'https://popularhitech.com/intl/', 'https://popularhitech.com/intl/'],
            'long_names' => ['TVShareMax INTL', 'TVShareMax INTL', 'TVShareMax INTL', 'TVShareMax INTL', 'TVShareMax INTL', 'TVShareMax INTL', 'TVShareMax INTL', 'TVShareMax INTL', 'TVShareMax INTL', 'TVShareMax INTL', 'TVShareMax INTL', 'TVShareMax INTL', 'TVShareMax INTL', 'TVShareMax INTL', 'TVShareMax INTL', 'TVShareMax INTL', 'TVShareMax INTL', 'TVShareMax INTL', 'TVShareMax INTL', 'TVShareMax INTL', 'TVShareMax INTL', 'TVShareMax INTL', 'TVShareMax INTL', 'TVShareMax INTL', 'TVShareMax INTL'],
            'names' => ['ClearView', 'ClearView', 'ClearView', 'ClearView', 'ClearView', 'ClearView', 'ClearView', 'ClearView', 'ClearView', 'ClearView', 'ClearView', 'ClearView', 'ClearView', 'ClearView', 'ClearView', 'ClearView', 'ClearView', 'ClearView', 'ClearView', 'ClearView', 'ClearView', 'ClearView', 'ClearView', 'ClearView', 'ClearView', 'ClearView'],
            'vals' => [
                33.673469387755105,15.306122448979592,14.285714285714286,4.081632653061225,3.061224489795918,3.061224489795918,3.061224489795918,3.061224489795918, 2.0408163265306123,2.0408163265306123, 2.0408163265306123,1.0204081632653061,1.0204081632653061,1.0204081632653061,1.0204081632653061,1.0204081632653061,1.0204081632653061,1.0204081632653061,
                1.0204081632653061,1.0204081632653061,1.0204081632653061,1.0204081632653061,1.0204081632653061,1.0204081632653061,
                1.0204081632653061,4.263256414560601e-14],
        ];

        $top_3_country_offers = [
            'ClearView'=>[
                'names'=>['Canada','Australia','Argentina'],
                'vals'=>[8,2,2],
            ],
            'MaxPhone'=>[
                'names'=>['Israel','United States','Switzerland'],
                'vals'=>[7,2,2],
            ],

            'TVShareMax'=>[
                'names'=>['United States','New Caledonia','Costa Rica'],
                'vals'=>[29,1,1],
            ]
        ];


        $data['geos'] = $geos;
        $data['offers'] = $offers;
        $data['top_3_country_offers'] = $top_3_country_offers;

        return response()->json($data);
    }

}
