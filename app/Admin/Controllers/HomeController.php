<?php

namespace App\Admin\Controllers;

use App\Models\Geos;
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

        if($data['today_sale']==0){
            $data['country_percent'] = '0';
        }else{
            $data['country_percent'] = round(($data['country_total'] / $data['today_sale'])* 100) ;
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

        if($data['today_sale']==0){
            $data['offer_percent'] = '0';
        }else{
            $data['offer_percent'] = round(($data['offer_total'] / $data['today_sale'])* 100) ;
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
        $offer_last_week = DB::table('offer_logs AS log')->where('log.status', 2)->where('log.created_at', '>',$lastStartDate)->where('log.created_at', '<=', $lastEndDate)
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



        if(!empty($offer_last_week)){

            foreach ($offer_last_week as $key=>$value){
                $country_list = OfferLog::where('offer_id',$value->offer_id)
                    ->select(DB::raw('sum(revenue) as offer_total'),'country_id')
                    ->groupBy('country_id')->orderByDesc('offer_total')
                    ->limit(3)
                    ->get()->toArray();


                if(!empty($country_list)){
                    $country_name_list = '';
                    foreach ($country_list as $x=>$y){
                        $country_name = Geos::where('id',$y['country_id'])->value('country');
                        $country_name_list .=$country_name.',';
                    }
                }


                $offer_last_week[$key]->country_id =$country_list;
                $offer_last_week[$key]->country_list =trim($country_name_list,',');

                if($data['last_week_sale']==0){
                    $offer_last_week[$key]->last_week_percent = 0;
                }else{
                    $offer_last_week[$key]->last_week_percent = round($value->offer_total/$data['last_week_sale']*100,2);

                }
            }






        }

        $data['offer_last_week']=$offer_last_week;

//        print_r("<pre/>");
//        print_r($offer_last_week);exit;

        return $content
            ->title('Dashboard')
            ->description('Description...')
            ->body(new Box('', view('admin.home.dashboard', ['data' => $data])));


    }



    public function query(Request $Request)
    {

     $data = Geos::limit(10)->get()->toArray();

        foreach ($data as $key=>$value){
            $data[$key]['id'] = $value['country_ios_code'];


        }


        $data['levels'][0]['locations'] = $data;
        return $data;
    }

    // search data
    public function search(Request $request){
        $step = $request->input("step");
        $data = [];
        // full_dashboard_data
        if($step=='full_dashboard_data') {
            
        }
        // 
        if($step=='dashboard_week_jvector') {
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
        if($step=='dashboard_geos') {

        }

        // last_sales
        if($step=='last_sales') {
            
        }

        return response()->json($data);
    }

    public function reporting(Request $request) {
        
        $data = [];

        //
        $data['mapheight'] = "900";
        $data['mapwidth'] = "900";
        $data['maxscale'] = "900";
        $data['minimap'] = true;
        $data['categories'] = [];
        $data['sidebar'] = true;
        $levels = [];
        $levels[0]['id'] = "states";
        $levels[0]['map'] = "/images/map.png";
        $levels[0]['minimap'] = "/images/states/us-small.jpg";
        $levels[0]['title'] = "states";
        $locations = [];

        $locations[] = [
            'action'=> "tooltip",
            'description'=> "tooltip",
            'id'=> "au",
            'pin'=> "hidden",
            'pin'=> "hidden",
            'select_detect'=> "Austria",
            'title'=> "Austria",
            'x'=> "0.5218",
            'y'=> "0.3851",
        ];

        $levels[0]['locations'] = $locations;

        $data['levels'] = $levels;


        return response()->json($data);
    }


}
