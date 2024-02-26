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

class IntelligencesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Intelligences';


    public function index(Content $content)
    {
        return $content
//            ->header('Chartjs')
            ->body(new Box('Bar chart', view('admin.intelligences.echart')));
    }


    public function echat(Content $content)
    {

        $currentUser = auth()->user(); // 获取当前登录用户的模型对象
        $net_id = $currentUser->id; // 输出当前用户名称
        $where = [];
        if($net_id!==1 && $net_id!==2){
            $where[]=['admin_id','=',$net_id];
        }

        $geos_list = Geos::get()->toArray();//国家列表
        $startDate = date('Y-m-d 00:00:00', strtotime("-7 days")); //默认最近一周的数据
        $endDate = date('Y-m-d H:i:s');

        //查询当前月的销售金额记录并按数量降序排列
        $offer_sale = OfferLog::whereBetween('created_at', [$startDate, $endDate])->where($where)->where('status',2)
            ->select(DB::raw('SUM(revenue) as total_sales'), 'offer_id')
            ->groupBy('offer_id')
            ->orderByDesc('total_sales')
            ->take(3)
            ->get()
            ->toArray();


        $offer_log_count = OfferLog::whereBetween('created_at', [$startDate, $endDate])->where('status',2)->where($where)->sum('revenue');

        foreach ($offer_sale as $key => $value) {

            if($offer_log_count==0){
                $offer_sale[$key]['sales_percent'] = 0 ;
            }else{
                $offer_sale[$key]['sales_percent'] = round($value['total_sales'] / $offer_log_count, 2);

            }




            $offer_sale[$key]['offer_name'] = Offer::where('id', $value['offer_id'])->value('offer_name');
            //  $offer_sale[$key]['sales_copy'] = Offer::where('id', $value['offer_id'])->value('offer_name');

            unset($offer_sale[$key]['total_sales']);
            unset($offer_sale[$key]['offer_id']);

        }




        $offer_id = array_column($offer_sale, 'offer_name');
        $total_sales = array_column($offer_sale, 'total_sales');
        //使用 array_map 和 array_values 删除键，只保留键值
        $sale_data = array_map('array_values', $offer_sale);
        $month = date('M');


//        print_r("<pre/>");
//        print_r($sale_data);exit;

        //排名前三的offer
        $offer_count = OfferLog::whereBetween('created_at', [$startDate, $endDate])->where($where)->where('status',2)
            ->select(DB::raw('count(id) as total_quantity'), 'offer_id')
            ->groupBy('offer_id')
            ->orderByDesc('total_quantity')
            ->take(3)
            ->get()
            ->toArray();


        $total_count = OfferLog::where('status',2)->count();

        foreach ($offer_count as $key => $value) {
            $offer_count[$key]['offer_top'] = Offer::where('id', $value['offer_id'])->value('offer_name');

            if($total_count==0){
                $offer_count[$key]['offer_percent'] = "0%";
            }else{
                $offer_count[$key]['offer_percent'] = round($value['total_quantity'] / $total_count * 100) . "%";

            }



        }




        $offer_top = array_column($offer_count, 'offer_top');
        $total_quantity = array_column($offer_count, 'total_quantity');
        $offer_percent = array_column($offer_count, 'offer_percent');


        //排名前十的国家
        $country_count = OfferLog::whereBetween('created_at', [$startDate, $endDate])->where($where)->where('status',2)
            ->select(DB::raw('count(id) as country_total_quantity'), 'country_id')
            ->groupBy('country_id')
            ->orderByDesc('country_total_quantity')
            ->take(10)
            ->get()
            ->toArray();


        $total_count = OfferLog::where('status',2)->count();

        foreach ($country_count as $key => $value) {
            $country_count[$key]['country_top'] = Geos::where('id', $value['country_id'])->value('country');

            if($total_count==0){
                $country_count[$key]['country_percent'] = "0%";
            }else{
                $country_count[$key]['country_percent'] = round($value['country_total_quantity'] / $total_count * 100) . "%";

            }


        }


        $country_top = array_column($country_count, 'country_top');
        $country_total_quantity = array_column($country_count, 'country_total_quantity');
        $country_percent = array_column($country_count, 'country_percent');


        $offer_list = Offer::where('offer_status', 1)->orderBy('created_at', 'desc')->where($where)->limit(3)->get()->toArray();


        $all_offer = Offer::where($where)->orderBy('created_at', 'desc')->get()->toArray();


//        print_r("<pre/>");
//     print_r($offer_list);exit;

        //柱状图数据
        $data = [
            "geos_list" => $geos_list,//国家列表
            "offer_sale" => $sale_data,//销量金额前三的柱状图
            'offer' => $offer_id,//饼状图offer list
            'total_quantity' => $total_quantity,//饼状图数量
            'month' => $month,//柱状图当前月份
            'country' => $country_top,//国家前十列表
            'country_total_quantity' => $country_total_quantity,//国家前十数据

        ];

//        print_r("<pre/>");
//        print_r($country_count);exit;

        $data = response()->json(['data' => $data]);

        return $content
//            ->header('Chartjs')
            ->body(new Box('Bar chart', view('intelligences.echat', ['data' => $data, 'category_lis' => $geos_list, 'offer_count' => $offer_count,'all_offer'=>$all_offer, 'country_count' => $country_count, 'offer_list' => $offer_list])));


    }


    public function offerPie(Request $request)
    {

        $currentUser = auth()->user(); // 获取当前登录用户的模型对象
        $net_id = $currentUser->id; // 输出当前用户名称





        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $country = $request->input('country');


        $start_date = \DateTime::createFromFormat('d/m/Y', $start_date);
        $end_date = \DateTime::createFromFormat('d/m/Y', $end_date);

        $start_date = $start_date->format('Y-m-d');
        $end_date = $end_date->format('Y-m-d');


        if (!empty($start_date) && !empty($end_date)) {

            $start_date = substr($start_date, 0, 10);
            $end_date = substr($end_date, 0, 10);


            $start_date = date('Y-m-d', strtotime($start_date));
            $end_date = date('Y-m-d', strtotime($end_date));

            $startDate = $start_date . ' 00:00:00';
            $endDate = $end_date . ' 23:59:59';
        } else {
            $startDate = date('Y-m-d 00:00:00', strtotime("-7 days"));
            $endDate = date('Y-m-d 23:59:59');
        }

        $where = [];
        if (!empty($country)) {
            $where[] = ['country_id', 'in', $country];
        }
        if($net_id!==1 && $net_id!==2){
            $where[]=['admin_id','=',$net_id];
        }
        DB::connection()->enableQueryLog();

        //查询当前月的销售记录并按数量降序排列
        $offer_sale = OfferLog::whereBetween('created_at', [$startDate, $endDate])->where('status',2)
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


        $offer_count = OfferLog::whereBetween('created_at', [$startDate, $endDate])->where('status',2)
            ->where($where)
            ->select(DB::raw('count(id) as total_quantity'), 'offer_id')
            ->groupBy('offer_id')
            ->orderByDesc('total_quantity')
            ->take(3)
            ->get()
            ->toArray();


        $total_count = OfferLog::where('status',2)->count();

        foreach ($offer_count as $key => $value) {
            $offer_count[$key]['offer_top'] = Offer::where('id', $value['offer_id'])->value('offer_name');
            if($total_count==0){
                $offer_count[$key]['offer_percent'] = "0%";
            }else{
                $offer_count[$key]['offer_percent'] = round($value['total_quantity'] / $total_count * 100) . "%";

            }



        }

        $offer_top = array_column($offer_count, 'offer_top');
        $total_quantity = array_column($offer_count, 'total_quantity');
        $offer_percent = array_column($offer_count, 'offer_percent');


        $total_sales_html = $this->html($offer_count, 1);


        $sale = [
            'offer' => $offer_id,
            'sale' => $total_sales,
            'sale_data' => $offer_count,
            'total_quantity' => $total_quantity,
            'offer_percent' => $offer_percent,
            'total_sales_html' => $total_sales_html
        ];


        $data = [
            "offer_sale" => $sale,
        ];

        return response()->json(['data' => $data]);

    }


    public function countryPie(Request $request)
    {
        $currentUser = auth()->user(); // 获取当前登录用户的模型对象
        $net_id = $currentUser->id; // 输出当前用户名称


        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $offers = $request->input('offers');

//        print_r($start_date);exit;


        $start_date = \DateTime::createFromFormat('d/m/Y', $start_date);
        $end_date = \DateTime::createFromFormat('d/m/Y', $end_date);

        $start_date = $start_date->format('Y-m-d');
        $end_date = $end_date->format('Y-m-d');



        if (!empty($start_date) && !empty($end_date)) {

            $start_date = substr($start_date, 0, 10);
            $end_date = substr($end_date, 0, 10);


            $start_date = date('Y-m-d', strtotime($start_date));
            $end_date = date('Y-m-d', strtotime($end_date));

            $startDate = $start_date . ' 00:00:00';
            $endDate = $end_date . ' 23:59:59';
        } else {
            $startDate = date('Y-m-d 00:00:00', strtotime("-7 days"));
            $endDate = date('Y-m-d 23:59:59');
        }



//        print_r($startDate);exit;

        $where = [];
        if (!empty($offers)) {
            $where[] = ['offer_id', 'in', $offers];
        }
        if($net_id!==1 && $net_id!==2){
            $where[]=['admin_id','=',$net_id];
        }
        DB::connection()->enableQueryLog();

        //查询当前月的销售记录并按数量降序排列
        $offer_sale = OfferLog::whereBetween('created_at', [$startDate, $endDate])->where('status',2)
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


        $country_count = OfferLog::whereBetween('created_at', [$startDate, $endDate])->where('status',2)
            ->where($where)
            ->select(DB::raw('count(id) as country_total_quantity'), 'country_id')
            ->groupBy('country_id')
            ->orderByDesc('country_total_quantity')
            ->take(10)
            ->get()
            ->toArray();


        $total_count = OfferLog::where('status',2)->count();

        foreach ($country_count as $key => $value) {
            $country_count[$key]['country_top'] = Geos::where('id', $value['country_id'])->value('country');

            if($total_count==0){
                $country_count[$key]['country_percent'] = '0%';
            }else{
                $country_count[$key]['country_percent'] = round($value['country_total_quantity'] / $total_count * 100) . "%";

            }



        }

        $country_top = array_column($country_count, 'country_top');
        $country_total_quantity = array_column($country_count, 'country_total_quantity');
        $country_percent = array_column($country_count, 'country_percent');
        $total_sales_html = $this->html($country_count, 2);


        $sale = [
            'country' => $country_top,
            'sale' => $total_sales,
            'sale_data' => $country_count,
            'country_total_quantity' => $country_total_quantity,
            'offer_percent' => $country_percent,
            'total_sales_html' => $total_sales_html
        ];

        $data = [
            "offer_sale" => $sale,
        ];


//        print_r($data);exit;


        return response()->json(['data' => $data]);

    }


    //html拼接
    protected function html($res, $type)
    {


        $html = '';
        foreach ($res as $key => $item) {

            if ($type == 1) {
                $name = $item['offer_top'];
                $percent = $item['offer_percent'];
            } else {
                $name = $item['country_top'];
                $percent = $item['country_percent'];
            }


            $data = '<tr><td class="text-center">' . $name . '</td><td class="text-center">' . $percent . '</td><td><div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: ' . $percent . ';background-color: #0090d9"></div></div></td></tr>';


            $html .= $data;
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
        $offer_sale = OfferLog::whereBetween('created_at', [$startDate, $endDate])->where('status',2)
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
