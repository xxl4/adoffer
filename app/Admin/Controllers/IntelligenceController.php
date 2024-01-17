<?php

namespace App\Admin\Controllers;

use AlibabaCloud\Tea\Response;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Creatives;
use App\Models\Geos;
use App\Models\Offer;
use App\Models\OfferLog;
use App\Models\OfferTracks;
use App\Models\OfferTracksCate;
use App\Models\OfferTracksCates;
use App\Models\TagsModel;
use Carbon\Carbon;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Widgets\Box;
use Encore\Admin\Widgets\Table;
use Encore\Admin\Actions\RowAction;
use App\Admin\Actions\Post\Replicate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class IntelligenceController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Intelligence';


    public function index(Content $content)
    {
//


        return $content
            ->header('Chartjs')
            ->body(new Box('Bar chart', view('admin.intelligence.echart')));
    }


    public function echat(Content $content)
    {

        $geos_list = Geos::get()->toArray();//国家列表

        $startDate =  date('Y-m-d 00:00:00', strtotime("-6 days")); //默认最近一周的数据
        $endDate = date('Y-m-d H:i:s');

        //查询当前月的销售金额记录并按数量降序排列
        $offer_sale = OfferLog::whereBetween('created_at', [$startDate, $endDate])
            ->select(DB::raw('SUM(revenue) as total_sales'), 'offer_id')
            ->groupBy('offer_id')
            ->orderByDesc('total_sales')
            ->take(3)
            ->get()
            ->toArray();


        foreach ($offer_sale as $key => $value) {
            $offer_sale[$key]['offer_id'] = Offer::where('id', $value['offer_id'])->value('offer_name');
        }

        $offer_id = array_column($offer_sale, 'offer_id');
        $total_sales = array_column($offer_sale, 'total_sales');
        //使用 array_map 和 array_values 删除键，只保留键值
        $sale_data = array_map('array_values', $offer_sale);
        $month = date('M');


//        print_r("<pre/>");
//        print_r($sale_data);exit;




        //排名前三的offer
        $offer_count = OfferLog::whereBetween('created_at', [$startDate, $endDate])
            ->select(DB::raw('count(id) as total_quantity'), 'offer_id')
            ->groupBy('offer_id')
            ->orderByDesc('total_quantity')
            ->take(3)
            ->get()
            ->toArray();


        $total_count = OfferLog::count();

        foreach ($offer_count as $key => $value) {
            $offer_count[$key]['offer_top'] = Offer::where('id', $value['offer_id'])->value('offer_name');
            $offer_count[$key]['offer_percent'] = round($value['total_quantity'] / $total_count * 100) . "%";
        }

        $offer_top = array_column($offer_count, 'offer_top');
        $total_quantity = array_column($offer_count, 'total_quantity');
        $offer_percent = array_column($offer_count, 'offer_percent');



        //排名前十的国家
        $country_count = OfferLog::whereBetween('created_at', [$startDate, $endDate])
            ->select(DB::raw('count(id) as country_total_quantity'), 'country_id')
            ->groupBy('country_id')
            ->orderByDesc('country_total_quantity')
            ->take(10)
            ->get()
            ->toArray();


        $total_count = OfferLog::count();

        foreach ($country_count as $key => $value) {
            $country_count[$key]['country_top'] = Geos::where('id', $value['country_id'])->value('country');
            $country_count[$key]['country_percent'] = round($value['country_total_quantity'] / $total_count * 100) . "%";
        }



        $country_top = array_column($country_count, 'country_top');
        $country_total_quantity = array_column($country_count, 'country_total_quantity');
        $country_percent = array_column($country_count, 'country_percent');





      $offer_list =  Offer::where('offer_status',1)->orderBy('created_at','desc')->limit(3)->get()->toArray();


//        print_r("<pre/>");
//     print_r($offer_list);exit;

        //柱状图数据
        $data = [
            "geos_list" => $geos_list,//国家列表
            "offer_sale" => $sale_data,//销量金额前三的柱状图
            'offer' => $offer_id,//饼状图offer list
            'total_quantity' => $total_quantity,//饼状图数量
            'month' => $month,//柱状图当前月份

            'country'=>$country_top,//国家前十列表
            'country_total_quantity'=>$country_total_quantity,//国家前十数据


        ];
        $data = response()->json(['data' => $data]);

        return $content
            ->header('Chartjs')
            ->body(new Box('Bar chart', view('intelligence.echat', ['data' => $data, 'category_lis' => $geos_list,'offer_count'=>$offer_count,'country_count'=>$country_count,'offer_list'=>$offer_list])));



    }


    public function offerPie(Request$request)
    {

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $country = $request->input('country');


        if(!empty($start_date) && !empty($end_date)){

            $start_date =  substr($start_date, 0, 10);
            $end_date =  substr($end_date, 0, 10);


            $start_date =  date('Y-m-d',strtotime($start_date));
            $end_date =  date('Y-m-d',strtotime($end_date));

            $startDate = $start_date . ' 00:00:00';
            $endDate = $end_date . ' 23:59:59';
        }else{
            $startDate =  date('Y-m-d 00:00:00', strtotime("-6 days"));
            $endDate = date('Y-m-d 23:59:59');
        }

        $where = [];
        if(!empty($country)){
            $where[] = ['country_id','in', $country];
        }
        DB::connection()->enableQueryLog();

        //查询当前月的销售记录并按数量降序排列
        $offer_sale = OfferLog::whereBetween('created_at', [$startDate, $endDate])
            ->where($where)
            ->select(DB::raw('SUM(revenue) as total_sales'), 'offer_id')
            ->groupBy('offer_id')
            ->orderByDesc('total_sales')
            ->take(3)
            ->get()->toArray();

        $carNamedata = DB::getQueryLog();



        foreach ($offer_sale as $key => $value) {
            $offer_sale[$key]['offer_id'] = Offer::where('id', $value['offer_id'])->value('offer_name');
        }

        $offer_id = array_column($offer_sale, 'offer_id');
        $total_sales = array_column($offer_sale, 'total_sales');
        //使用 array_map 和 array_values 删除键，只保留键值
        $newArray = array_map('array_values', $offer_sale);
        $month = date('M');



        $offer_count = OfferLog::whereBetween('created_at', [$startDate, $endDate])
            ->where($where)
            ->select(DB::raw('count(id) as total_quantity'), 'offer_id')
            ->groupBy('offer_id')
            ->orderByDesc('total_quantity')
            ->take(3)
            ->get()
            ->toArray();


        $total_count = OfferLog::count();

        foreach ($offer_count as $key => $value) {
            $offer_count[$key]['offer_top'] = Offer::where('id', $value['offer_id'])->value('offer_name');
            $offer_count[$key]['offer_percent'] = round($value['total_quantity'] / $total_count * 100) . "%";
        }

        $offer_top = array_column($offer_count, 'offer_top');
        $total_quantity = array_column($offer_count, 'total_quantity');
        $offer_percent = array_column($offer_count, 'offer_percent');


        $total_sales_html = $this->html($offer_count,1);



        $sale = [
            'offer' => $offer_id,
            'sale' => $total_sales,
            'sale_data' => $offer_count,
            'total_quantity' => $total_quantity,
            'offer_percent' => $offer_percent,
            'total_sales_html'=>$total_sales_html
        ];



        $data = [
            "offer_sale" => $sale,
        ];

        return response()->json(['data' => $data]);

    }




    public function countryPie(Request$request)
    {

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $country = $request->input('country');



        if(!empty($start_date) && !empty($end_date)){

            $start_date =  substr($start_date, 0, 10);
            $end_date =  substr($end_date, 0, 10);


            $start_date =  date('Y-m-d',strtotime($start_date));
            $end_date =  date('Y-m-d',strtotime($end_date));

            $startDate = $start_date . ' 00:00:00';
            $endDate = $end_date . ' 23:59:59';
        }else{
            $startDate =  date('Y-m-d 00:00:00', strtotime("-6 days"));
            $endDate = date('Y-m-d 23:59:59');
        }

        $where = [];
        if(!empty($country)){
            $where[] = ['country_id','in', $country];
        }
        DB::connection()->enableQueryLog();

        //查询当前月的销售记录并按数量降序排列
        $offer_sale = OfferLog::whereBetween('created_at', [$startDate, $endDate])
            ->where($where)
            ->select(DB::raw('SUM(revenue) as total_sales'), 'offer_id')
            ->groupBy('offer_id')
            ->orderByDesc('total_sales')
            ->take(3)
            ->get()->toArray();
        $carNamedata = DB::getQueryLog();



        foreach ($offer_sale as $key => $value) {
            $offer_sale[$key]['offer_id'] = Offer::where('id', $value['offer_id'])->value('offer_name');
        }

        $offer_id = array_column($offer_sale, 'offer_id');
        $total_sales = array_column($offer_sale, 'total_sales');
        //使用 array_map 和 array_values 删除键，只保留键值
        $newArray = array_map('array_values', $offer_sale);
        $month = date('M');


//        print_r($startDate);exit;


        $country_count = OfferLog::whereBetween('created_at', [$startDate, $endDate])
            ->where($where)
            ->select(DB::raw('count(id) as country_total_quantity'), 'country_id')
            ->groupBy('country_id')
            ->orderByDesc('country_total_quantity')
            ->take(10)
            ->get()
            ->toArray();




        $total_count = OfferLog::count();

        foreach ($country_count as $key => $value) {
            $country_count[$key]['country_top'] = Geos::where('id', $value['country_id'])->value('country');
            $country_count[$key]['country_percent'] = round($value['country_total_quantity'] / $total_count * 100) . "%";
        }

        $country_top = array_column($country_count, 'country_top');
        $country_total_quantity = array_column($country_count, 'country_total_quantity');
        $country_percent = array_column($country_count, 'country_percent');


        $total_sales_html = $this->html($country_count,2);



//        print_r($country_top);exit;




        $sale = [
            'country' => $country_top,
            'sale' => $total_sales,
            'sale_data' => $country_count,
            'country_total_quantity' => $country_total_quantity,
            'offer_percent' => $country_percent,
            'total_sales_html'=>$total_sales_html
        ];

        $data = [
            "offer_sale" => $sale,
        ];


//        print_r($data);exit;


        return response()->json(['data' => $data]);

    }






    //html拼接
    protected function html($res,$type)
    {


        $html = '';
        foreach ($res as $key=>$item){

            if($type==1){
                $name = $item['offer_top'];
               $percent = $item['offer_percent'];
            }else{
                $name = $item['country_top'];
                $percent = $item['country_percent'];
            }


            $data = '<tr><td class="text-center">'.$name.'</td><td class="text-center">'.$percent.'</td><td><div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: '.$percent.';background-color: #0090d9"></div></div><span class="percentage">'.$percent.'</span></td></tr>';



            $html .=$data;
        }



        return $html;
    }



    public function query(Request $request)
    {
//echo 1234;exit;
        $geos_list = Geos::get()->toArray();
        $category_list = Category::get()->toArray();


        $startDate = Carbon::now()->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();

// 查询当前月的销售记录并按数量降序排列
        $offer_sale = OfferLog::whereBetween('created_at', [$startDate, $endDate])
            ->select(DB::raw('SUM(revenue) as total_sales'), 'offer_id')
            ->groupBy('offer_id')
            ->orderByDesc('total_sales')
            ->take(3)
            ->get()->toArray();


        // 输出结果
        print_r("<pre/>");
        print_r($offer_sale);
        exit;


//        $category_list = Offer::get()->toArray();
//        print_r($category_list);exit;


        $data = [

            'geos_list' => $geos_list,
            'category_lis' => $category_list,
            'offer_sale' => $offer_sale

        ];


        return response()->json($data);
    }


    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Offer());
        $grid->model()->orderBy('id', 'desc');
        $grid->column('id', __('Id'));
        $grid->column('offer_name', __('Offer name'));
        $grid->column('cate_id', __('Cate id'));
        $grid->column('image', __('Image'))->image('', 50, 50);
        $grid->column('des', __('Des'));
        $grid->column('offer_link', __('Offer link'))->link();
        $grid->column('offer_price', __('Offer price'));
        $grid->column('offer_status', __('Offer status'))->using(['1' => 'Live', '2' => 'Paused'])->label([
            1 => 'success',
            2 => 'danger',
        ]);
        $grid->column('created_at', __('Create at'));
        $grid->column('updated_at', __('Update at'));
        $grid->actions(function ($actions) {
            $actions->add(new Replicate);
        });

        $grid->column('cate_id', 'Categories')->display(function () {
//            $categoryIds = explode(',', $this->cate_id);
            $categories = Category::whereIn('id', $this->cate_id)->pluck('category_name')->toArray();

            return implode(', ', $categories);
        })->label();
        $grid->batchActions(function ($batch) {
//            $batch->disableDelete();
        });

        $grid->actions(function ($actions) {
            $actions->disableView();
        });


        $grid->paginate(10);
        return $grid;
    }


    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Offer::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('offer_name', __('Offer name'));
        $show->field('cate_id', __('Cate id'));
        $show->field('des', __('Des'));
        $show->field('offer_link', __('Offer link'));
        $show->field('offer_price', __('Offer price'));
        $show->field('offer_status', __('Offer status'));
        $show->field('image', __('Image'));
        $show->field('created_at', __('Create at'));
        $show->field('updated_at', __('Update at'));

        return $show;
    }

    public function create(Content $content)
    {

        return $content
            ->title($this->title())
            ->description($this->description['create'] ?? trans('admin.create'))
            ->body($this->form());
    }


    /**
     * Offer List
     *
     * @param mixed $id
     * @return Show
     */
    public function show($id, Content $content)
    {
//        echo phpinfo();exit;

        $geos_list = Geos::get()->toArray();
        $category_list = Category::get()->toArray();


        $filteredDataArray = Offer::where('offer_status', 1)->whereRaw('MOD(id, 2) = 1')->get()->toArray();//奇数
        $filteredDataArrayCopy = Offer::where('offer_status', 1)->whereRaw('MOD(id, 2) = 0')->get()->toArray();//偶数


        foreach ($filteredDataArray as $key => $value) {


            $accepted_area = Geos::whereIn('id', $value['accepted_area'])->select('country')->get()->toArray();

//            print_r("<pre/>");
//            print_r($accepted_area);exit;

            $accepted_area_data = '';
            foreach ($accepted_area as $k => $v) {
                $accepted_area_data .= $v['country'] . ',';
            }
//            print_r($accepted_area_data);exit;

            $filteredDataArray[$key]['accepted_area'] = trim($accepted_area_data, ',');


            $track_cate = OfferTracksCates::whereIn('id', $value['track_cate_id'])->select('id', 'track_cate')->get()->toArray();
//            print_r("<pre/>");
//            print_r($track_cate);exit;


//            print_r("<pre/>");
//            print_r($track_cate);exit;

//            $fieldToSwap = 'track_cate';
//            //// 使用 array_map 函数进行互换
//            $swappedArray = array_map(function ($key1, $item) use ($fieldToSwap) {
//                return [$item[$fieldToSwap] => array_merge(['key' => $key1], $item)];
//            }, array_keys($track_cate), $track_cate);
//            // 将结果数组进行合并
//            $finalArray = array_merge(...$swappedArray);

//            print_r("<pre/>");
//            print_r($finalArray);exit;


            foreach ($track_cate as $k => $v) {
                $finalArray[$k] = OfferTracks::where('track_type_id', $v['id'])->get()->toArray();
            }


            $filteredDataArray[$key]['track_list'] = $finalArray;
            $filteredDataArray[$key]['creatives'] = Creatives::whereIn('id', $value['creatives_id'])->get()->toArray();
        }


        foreach ($filteredDataArrayCopy as $key => $value) {


//            print_r($value['track_cate_id']);exit;


            $track_cate = OfferTracksCates::whereIn('id', $value['track_cate_id'])->select('id', 'track_cate')->get()->toArray();


//            $filteredDataArrayCopy[$key]['accepted_area'] = Geos::whereIn('id',$value['accepted_area'])->get()->toArray();

            $accepted_area = Geos::whereIn('id', $value['accepted_area'])->get()->toArray();

            $accepted_area_data = '';
            foreach ($accepted_area as $k => $v) {
                $accepted_area_data .= $v['country'] . ',';
            }

            $filteredDataArrayCopy[$key]['accepted_area'] = trim($accepted_area_data, ',');

//            $fieldToSwap = 'track_cate';
//            //// 使用 array_map 函数进行互换
//            $swappedArray = array_map(function ($key1, $item) use ($fieldToSwap) {
//                return [$item[$fieldToSwap] => array_merge(['key' => $key1], $item)];
//            }, array_keys($track_cate), $track_cate);
//            // 将结果数组进行合并
//            $finalArrayCopy = array_merge(...$swappedArray);

//            print_r("<pre/>");
//            print_r($track_cate);exit;


            foreach ($track_cate as $k => $v) {
                $finalArrayCopy[$k] = OfferTracks::where('track_type_id', $v['id'])->get()->toArray();//$v['track_cate'].'_'.$k
            }

            $filteredDataArrayCopy[$key]['track_list'] = $finalArrayCopy;
            $filteredDataArrayCopy[$key]['creatives'] = Creatives::whereIn('id', $value['creatives_id'])->get()->toArray();
        }


        $filteredDataArray = array_values($filteredDataArray);
        $filteredDataArrayCopy = array_values($filteredDataArrayCopy);


        $data = [
            'offer' => $filteredDataArray,
            'geos_list' => $geos_list,
            'category_list' => $category_list,
            'offer1' => $filteredDataArrayCopy,

        ];

//
//        print_r("<pre/>");
//        print_r($data);exit;


        return $content->title('详情')
            ->description('简介')
            ->view('offer.show', compact('data'));
    }


    protected function htmlSpliceCopy($offer)
    {

        $result = '';
        foreach ($offer as $key => $item) {


            if ($item['offer_status'] == 1) $lable_status = '<span class="label label-success">Live</span>'; else $lable_status = '<span class="label label-warning">Paused</span>';


            if (!empty($item['track_list'][0][0]['track_link'])) $main_link = $item['track_list'][0][0]['track_link']; else $main_link = '';


            $first = '<div class="col-md-12 accord" data-offer_db="CozyTime Pro" data-marker-id="' . $item['id'] . '"><ul class="nav nav-tabs" role="tablist"><li class="active"><a href="#tab0Offer_' . $key . '" role="tab" data-toggle="tab">Summary</a></li><li><a href="#tab0Description_' . $key . '" role="tab" data-toggle="tab">Description</a></li><li><a href="#tab0Geos_' . $key . '" role="tab" data-toggle="tab">Accepted Geos</a></li><li><a href="#tab0Tracking_' . $key . '" role="tab" data-toggle="tab">Tracking Links</a></li><li><a href="#tab0Creative_' . $key . '" role="tab" data-toggle="tab">Creatives</a></li></ul><div class="tools"><a href="javascript:;" class="collapse"></a><a href="?id=offer#grid-config" data-toggle="modal" class="config"></a><a href="javascript:;" class="reload"></a><a href="javascript:;" class="remove"></a></div><div class="tab-content"><div class="tab-pane active" id="tab0Offer_' . $key . '"><div class="row column-seperation"><div class="col-md-12"><table class="table table-striped table-flip-scroll cf"><thead class="cf"><tr><th><a href="' . $main_link . '" target="_blank">' . '<span class="offer-product-img-container" data-original-title="" title=""><img src="' . env('APP_URL') . '/upload/' . $item['image'] . '"></span>Offer Preview<i class="icon ion-eye"></i></a></th><th>Payout</th><th>Status</th></tr></thead><tbody><tr><td width="55%">' . $item['offer_name'] . '</td><td width="25%">$' . $item['offer_price'] . ' Per Sale</td><td width="20%">' . $lable_status . '</td></tr></tbody></table></div></div></div><div class="tab-pane" id="tab0Description_' . $key . '"><div class="row"><div class="col-md-12"><p></p><p><strong></strong></p><p>"' . $item['des'] . '"</p><p></p></div></div></div><div class="tab-pane" id="tab0Geos_' . $key . '"><div class="row"><div class="col-md-12"><p></p><p>' . $item['accepted_area'] . '</p></div></div></div><div class="tab-pane" id="tab0Tracking_' . $key . '"><div class="row"><div class="col-md-12"><p>' . $item['track_des'] . '</p></div><div class="col-md-12"><div class="row"><div class="col-md-12"><div class="tabbable tabs-left tabs-bg"><ul class="nav nav-tabs" role="tablist">';


            //追踪链接的tab
            $track_tab = '';
            foreach ($item['track_list'] as $key2 => $item2) {
                if ($key2 == 0) {
                    $track_tab .= '<li class="active"><a href="?id=offer#advertorialpages12-1' . $key2 . $key . '" role="tab" data-toggle="tab">Advertorial Pages' . $key2 . $key . '</a></li>';
                } else {
                    $track_tab .= '<li><a href="?id=offer#advertorialpages12-1' . $key2 . $key . '" role="tab" data-toggle="tab">Advertorial Pages' . $key2 . $key . '</a></li>';
                }
            }

            $tab_content = '</ul><div class="tab-content">';
            //追踪链接的tab 对应内容
            $track1 = '';
            $track = '';
            foreach ($item['track_list'] as $k => $i) {
                if ($k == 0) {
                    $track1 = '<div class="tab-pane active" id="advertorialpages12-1' . $k . $key . '">';
                } else {
                    $track1 = '<div class="tab-pane" id="advertorialpages12-1' . $k . $key . '">';
                }
                $row = '<div class="row">';
                $data1 = '';
                foreach ($i as $key4 => $item4) {
                    $data1 .= '<div class="col-md-12"><div class="padding-for_links"><div>' . $item4['track_name'] . '</div><input  style="width: calc(100% - 100px)" readonly="" type="text" class="clipboard-1-0-0-1' . $k . '-1' . $key4 . '" value="' . $item4['track_link'] . '"><a href="' . $item4['track_link'] . '"><i class="icon ion-eye pull-right"></i></a><a class="copp pull-right btn btn-success btn-cons copy-button" data-clipboard-action="copy" data-clipboard-target=".clipboard-1-0-0-1' . $k . '-1' . $key4 . '">Copy</a></div></div>';

//                    $data1 .=$data1;
                }


                $data_div = ' </div></div>';
                $track .= $track1 . $row . $data1 . $data_div;
            }

            $third = '</div></div><div class="clearfix"></div></div></div></div></div></div><div class="tab-pane" id="tab0Creative_' . $key . '"><div class="row"><div class="col-md-12">';

            $forth = '';
            foreach ($item['creatives'] as $k1 => $i1) {
                $forth = '<p></p><p>' . $i1['name'] . '</p><p><a href="' . $i1['link'] . '" target="_blank">' . $i1['link'] . '</a></p>';
                $forth .= $forth;
            }

            $sixth = ' </div></div></div></div></div></div>';
            $result .= $first . $track_tab . $tab_content . $track . $third . $forth . $sixth;


        }


//        print_r($result);
//        exit;


        return $result;

    }


    protected function htmlSpliceCopy1($offer)
    {


//        print_r($offer);exit;

        $result = '';
        foreach ($offer as $key => $item) {


            if ($item['offer_status'] == 1) $lable_status = '<span class="label label-success">Live</span>'; else $lable_status = '<span class="label label-warning">Paused</span>';
            if (!empty($item['track_list'][0][0]['track_link'])) $main_link = $item['track_list'][0][0]['track_link']; else $main_link = '';


            $first = '<div class="col-md-12 accord" data-offer_db="CozyTime Pro" data-marker-id="' . $item['id'] . '"><ul class="nav nav-tabs" role="tablist"><li class="active"><a href="#tab0Offer_8' . $key . '" role="tab" data-toggle="tab">Summary</a></li><li><a href="#tab0Description_8' . $key . '" role="tab" data-toggle="tab">Description</a></li><li><a href="#tab0Geos_8' . $key . '" role="tab" data-toggle="tab">Accepted Geos</a></li><li><a href="#tab0Tracking_8' . $key . '" role="tab" data-toggle="tab">Tracking Links</a></li><li><a href="#tab0Creative_8' . $key . '" role="tab" data-toggle="tab">Creatives</a></li></ul><div class="tools"><a href="javascript:;" class="collapse"></a><a href="?id=offer#grid-config" data-toggle="modal" class="config"></a><a href="javascript:;" class="reload"></a><a href="javascript:;" class="remove"></a></div><div class="tab-content"><div class="tab-pane active" id="tab0Offer_8' . $key . '"><div class="row column-seperation"><div class="col-md-12"><table class="table table-striped table-flip-scroll cf"><thead class="cf"><tr><th><a href="' . $main_link . '" target="_blank">' . '<span class="offer-product-img-container" data-original-title="" title=""><img src="' . env('APP_URL') . '/upload/' . $item['image'] . '"></span>Offer Preview<i class="icon ion-eye"></i></a></th><th>Payout</th><th>Status</th></tr></thead><tbody><tr><td width="55%">' . $item['offer_name'] . '</td><td width="25%">$' . $item['offer_price'] . ' Per Sale</td><td width="20%">' . $lable_status . '</td></tr></tbody></table></div></div></div><div class="tab-pane" id="tab0Description_8' . $key . '"><div class="row"><div class="col-md-12"><p></p><p><strong></strong></p><p>"' . $item['des'] . '"</p><p></p></div></div></div><div class="tab-pane" id="tab0Geos_8' . $key . '"><div class="row"><div class="col-md-12"><p></p><p>' . $item['accepted_area'] . '</p></div></div></div><div class="tab-pane" id="tab0Tracking_8' . $key . '"><div class="row"><div class="col-md-12"><p>' . $item['track_des'] . '</p></div><div class="col-md-12"><div class="row"><div class="col-md-12"><div class="tabbable tabs-left tabs-bg"><ul class="nav nav-tabs" role="tablist">';


            //追踪链接的tab
            $track_tab = '';
            foreach ($item['track_list'] as $key2 => $item2) {
                if ($key2 == 0) {
                    $track_tab .= '<li class="active"><a href="?id=offer#advertorialpages128-1' . $key2 . $key . '" role="tab" data-toggle="tab">Advertorial Pages' . $key2 . $key . '</a></li>';
                } else {
                    $track_tab .= '<li><a href="?id=offer#advertorialpages128-1' . $key2 . $key . '" role="tab" data-toggle="tab">Advertorial Pages' . $key2 . $key . '</a></li>';
                }
            }

            $tab_content = '</ul><div class="tab-content">';
            //追踪链接的tab 对应内容
            $track1 = '';
            $track = '';
            foreach ($item['track_list'] as $k => $i) {
                if ($k == 0) {
                    $track1 = '<div class="tab-pane active" id="advertorialpages128-1' . $k . $key . '">';
                } else {
                    $track1 = '<div class="tab-pane" id="advertorialpages128-1' . $k . $key . '">';
                }
                $row = '<div class="row">';
                $data1 = '';
                foreach ($i as $key4 => $item4) {
                    $data1 .= '<div class="col-md-12"><div class="padding-for_links"><div>' . $item4['track_name'] . '</div><input  style="width: calc(100% - 100px)" readonly="" type="text" class="clipboard-1-0-0-1' . $key . '-' . $k . '-2' . $key4 . '" value="' . $item4['track_link'] . '"><a href="' . $item4['track_link'] . '"><i class="icon ion-eye pull-right"></i></a><a class="copp pull-right btn btn-success btn-cons copy-button" data-clipboard-action="copy" data-clipboard-target=".clipboard-1-0-0-1' . $key . '-' . $k . '-2' . $key4 . '">Copy</a></div></div>';

//                    $data1 .=$data1;
                }


                $data_div = ' </div></div>';
                $track .= $track1 . $row . $data1 . $data_div;
            }

            $third = '</div></div><div class="clearfix"></div></div></div></div></div></div><div class="tab-pane" id="tab0Creative_8' . $key . '"><div class="row"><div class="col-md-12">';

            $forth = '';
            foreach ($item['creatives'] as $k1 => $i1) {
                $forth = '<p></p><p>' . $i1['name'] . '</p><p><a href="' . $i1['link'] . '" target="_blank">' . $i1['link'] . '</a></p>';
                $forth .= $forth;
            }

            $sixth = ' </div></div></div></div></div></div>';
            $result .= $first . $track_tab . $tab_content . $track . $third . $forth . $sixth;


        }


//        print_r($result);
//        exit;


        return $result;

    }

    /**
     * 内容拼接
     * @param Request $request
     * @return false|string
     */
    protected function htmlSplice($offer)
    {

        $result = '';
        foreach ($offer as $key => $item) {

            $first = '<div class="col-md-12 accord" data-offer_db="CozyTime Pro" data-marker-id="' . $item['id'] . '"><ul class="nav nav-tabs" role="tablist"><li class="active"><a href="#tab0Offer_' . $key . '" role="tab" data-toggle="tab">Summary</a></li><li><a href="#tab0Description_' . $key . '" role="tab" data-toggle="tab">Description</a></li><li><a href="#tab0Geos_' . $key . '" role="tab" data-toggle="tab">Accepted Geos</a></li><li><a href="#tab0Tracking_' . $key . '" role="tab" data-toggle="tab">Tracking Links</a></li><li><a href="#tab0Creative_' . $key . '" role="tab" data-toggle="tab">Creatives</a></li></ul><div class="tools"><a href="javascript:;" class="collapse"></a><a href="?id=offer#grid-config" data-toggle="modal" class="config"></a><a href="javascript:;" class="reload"></a><a href="javascript:;" class="remove"></a></div><div class="tab-content"><div class="tab-pane active" id="tab0Offer_' . $key . '"><div class="row column-seperation"><div class="col-md-12"><table class="table table-striped table-flip-scroll cf"><thead class="cf"><tr><th><a href="123" target="_blank">' . '<span class="offer-product-img-container" data-original-title="" title=""><img src="' . $item['image'] . '" alt="CozyTime Pro"></span>Offer Preview<i class="icon ion-eye"></i></a></th><th>Payout</th><th>Status</th></tr></thead><tbody><tr><td width="55%">' . $item['offer_name'] . '</td><td width="25%">$' . $item['offer_price'] . ' Per Sale</td><td width="20%"><span class="label label-success">Live</span></td></tr></tbody></table></div></div></div><div class="tab-pane" id="tab0Description_' . $key . '"><div class="row"><div class="col-md-12"><p></p><p><strong>E-commerce - CozyTime Pro INTL - All Languages - EXCLUSIVE</strong></p><p>"' . $item['des'] . '"</p><p></p></div></div></div><div class="tab-pane" id="tab0Geos_' . $key . '"><div class="row"><div class="col-md-12"><p></p><p>' . $item['accepted_area'] . '</p></div></div></div><div class="tab-pane" id="tab0Tracking_' . $key . '"><div class="row"><div class="col-md-12"><p>' . $item['track_des'] . '</p></div><div class="col-md-12"><div class="row"><div class="col-md-12"><div class="tabbable tabs-left tabs-bg"><div class="tab-content"><div class="tab-pane active" id="provenorderpages-0"><div class="row"><div class="col-md-12">';

            $track = '';
            foreach ($item['track_list'] as $k => $i) {


                $track = '<div class="padding-for_links"><div>' . $i['track_name'] . '</div><input readonly="" type="text" class="form-control trecking_link clipboard-0-0-0 dynamicDomainTrackingLink" value="' . $i['track_link'] . '" target="_blank" class=" dynamicDomainTrackingLink"><i class="icon ion-eye pull-right"></i></a><button class="copp pull-right btn btn-success btn-cons" data-clipboard-action="copy" data-clipboard-target=".clipboard-0-0-0">Copy</button></div>';
                $track .= $track;
            }

            $third = '</div></div></div><div class="tab-pane" id="archivedorderpages-0"><div class="row"><div class="col-md-12"><div class="padding-for_links"><div>Order Page 2.0 - The N00b</div><input readonly="" type="text" class="form-control trecking_link clipboard-0-2-0 dynamicDomainTrackingLink" value="https://popularhitech.com/intl_2/?prod=cozytimepro&amp;net=6546&amp;aff={AFFID}&amp;sid={SUBID}&amp;cid={CLICKID}"><a href="https://popularhitech.com/intl_2/?prod=cozytimepro&amp;net=6546&amp;aff={AFFID}&amp;sid={SUBID}&amp;cid={CLICKID}" target="_blank" class=" dynamicDomainTrackingLink"><i class="icon ion-eye pull-right"></i></a><button class="copp pull-right btn btn-success btn-cons" data-clipboard-action="copy" data-clipboard-target=".clipboard-0-2-0">Copy</button></div><div class="padding-for_links"><div>Order Page 3.0 - The Multi-Step</div><input readonly="" type="text" class="form-control trecking_link clipboard-0-2-1 dynamicDomainTrackingLink" value="https://popularhitech.com/intl_3/?prod=cozytimepro&amp;net=6546&amp;aff={AFFID}&amp;sid={SUBID}&amp;cid={CLICKID}"><a href="https://popularhitech.com/intl_3/?prod=cozytimepro&amp;net=6546&amp;aff={AFFID}&amp;sid={SUBID}&amp;cid={CLICKID}" target="_blank" class=" dynamicDomainTrackingLink"><i class="icon ion-eye pull-right"></i></a><button class="copp pull-right btn btn-success btn-cons" data-clipboard-action="copy" data-clipboard-target=".clipboard-0-2-1">Copy</button></div><div class="padding-for_links"><div>Order Page 11.0 - The Money Maker</div><input readonly="" type="text" class="form-control trecking_link clipboard-0-2-2 dynamicDomainTrackingLink" value="https://popularhitech.com/intl_11/?prod=cozytimepro&amp;net=6546&amp;aff={AFFID}&amp;sid={SUBID}&amp;cid={CLICKID}"><a href="https://popularhitech.com/intl_11/?prod=cozytimepro&amp;net=6546&amp;aff={AFFID}&amp;sid={SUBID}&amp;cid={CLICKID}" target="_blank" class=" dynamicDomainTrackingLink"><i class="icon ion-eye pull-right"></i></a><button class="copp pull-right btn btn-success btn-cons" data-clipboard-action="copy" data-clipboard-target=".clipboard-0-2-2">Copy</button></div></div></div></div><div class="tab-pane" id="advertorialpages-0"><div class="row"><div class="col-md-12"><div class="padding-for_links"><div>Advertorial | EN</div><input readonly="" type="text" class="form-control trecking_link clipboard-0-3-0 dynamicDomainTrackingLink" value="https://popularhitech.com/advertorial/cozytimepro/?net=6546&amp;aff={AFFID}&amp;sid={SUBID}&amp;cid={CLICKID}"><a href="https://popularhitech.com/advertorial/cozytimepro/?net=6546&amp;aff={AFFID}&amp;sid={SUBID}&amp;cid={CLICKID}" target="_blank" class=" dynamicDomainTrackingLink"><i class="icon ion-eye pull-right"></i></a><button class="copp pull-right btn btn-success btn-cons" data-clipboard-action="copy" data-clipboard-target=".clipboard-0-3-0">Copy</button></div></div></div></div><div class="tab-pane" id="salespages-0"><div class="row"><div class="col-md-12"><div class="padding-for_links"><div>Sale Page | EN</div><input readonly="" type="text" class="form-control trecking_link clipboard-0-4-0 dynamicDomainTrackingLink" value="https://popularhitech.com/salespage/cozytimepro/?net=6546&amp;aff={AFFID}&amp;sid={SUBID}&amp;cid={CLICKID}"><a href="https://popularhitech.com/salespage/cozytimepro/?net=6546&amp;aff={AFFID}&amp;sid={SUBID}&amp;cid={CLICKID}" target="_blank" class=" dynamicDomainTrackingLink"><i class="icon ion-eye pull-right"></i></a><button class="copp pull-right btn btn-success btn-cons" data-clipboard-action="copy" data-clipboard-target=".clipboard-0-4-0">Copy</button></div></div></div></div></div></div><div class="clearfix"></div></div></div></div></div></div> <div class="tab-pane" id="tab0Creative_' . $key . '"><div class="row"><div class="col-md-12">';

            $forth = '';
            foreach ($item['creatives'] as $k1 => $i1) {
                $forth = '<p></p><p>' . $i1['name'] . '</p><p><a href="https://www.dropbox.com/scl/fo/fyoovooys02dhqnd4tcy3/h?rlkey=1jyre8331r9m5y723ztcudped&amp;dl=0" target="_blank">' . $i1['link'] . '</a></p>';
                $forth .= $forth;
            }

            $sixth = ' </div></div></div></div></div>';
            $result .= $first . $track . $third . $forth . $sixth;
        }


        print_r($result);
        exit;


        return $result;

    }


    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Offer());
//        $data = Category::get()->toArray();

//        foreach ($data as $item) {
//            $_item = $item["id"];
//            $_item1 = $item["category_name"];
//            $arr[$_item] = $_item1;
//        }

//        $form->multipleSelect('cate_id', __('Offer Category'))->options($arr)->required();

        $form->multipleSelect('cate_id', __('Offer Category'))->options(Category::all()->pluck('category_name', 'id'));


        $form->multipleSelect('accepted_area', __('Accepted Area'))->options(Geos::all()->pluck('country', 'id'))->required();
        $form->multipleSelect('creatives_id', __('Creatives'))->options(Creatives::all()->pluck('name', 'id'))->required();

        $form->multipleSelect('track_cate_id', __('Track Cate'))->options(OfferTracksCates::all()->pluck('track_cate', 'id'))->required();

        $form->text('offer_name', __('Offer name'))->required();
        $form->textarea('des', __('Offer Des'));
        $form->textarea('track_des', __('Track Des'));
        $form->image('image', __('Offer Image'));
        $form->currency('offer_price', __('Payout'))->required();
        $form->switch('offer_status', __('Offer status'))->default(1);

//        $form->saving(function (Form $form) {
//            print_r($form->image);exit;
//        });

        return $form;
    }


}
