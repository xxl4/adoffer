<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Creatives;
use App\Models\Delivery;
use App\Models\Geos;
use App\Models\LandPage;
use App\Models\Offer;
use App\Models\OfferLog;
use App\Models\OfferTracks;
use App\Models\OfferTracksCate;
use App\Models\OfferTracksCates;
use App\Models\ProductsFeed;
use App\Models\TabType;
use App\Models\TagsModel;
use App\Models\TrackLists;
use Encore\Admin\Auth\Database\Role;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Widgets\Table;
use Encore\Admin\Actions\RowAction;
use App\Admin\Actions\Post\Replicate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Encore\Admin\Facades\Admin;
use App\Admin\Forms\Steps;
use Encore\Admin\Widgets\MultipleSteps;
use App\Admin\Forms\Setting;
use Encore\Admin\Widgets\Tab;
use App\Admin\Forms\Settings;
use Encore\Admin\Form\Field\Editor;

class OfferController extends AdminController
{

    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Offer';
/*
    public function index(Content $content)
    {


//        var_dump($content);exit;

        return $content
            ->body('<div style="margin:5px 0 15px;">'.$this->buildPreviewButton().'</div>')
            ->body($this->form())
            ->header('Step Form')
            ->description('分步表单DEMO');
    }
*/
    public function register(Content $content)
    {

        $steps  = [
            'basic'=>Steps\OfferBasic::class,
            'track'  => Steps\OfferTrack::class,
            'other' => Steps\OfferSet::class,
        ];

        return $content
            ->title('注册用户')
            ->body(MultipleSteps::make($steps));
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
//        $grid->column('cate_id', __('Cate id'));
        $grid->column('image', __('Image'))->image('', 50, 50);
        $grid->column('des', __('Des'));
        $grid->column('offer_status', __('Offer status'))->using(['1' => 'Live', '0' => 'Paused', 2 => 'Del'])->label([
            1 => 'success',
            0 => 'danger',
            2 => 'Del',
        ]);
        $grid->column('created_at', __('Create at'));
        $grid->actions(function ($actions) {
            $actions->add(new Replicate);
        });

//        $grid->column('cate_id', 'Categories')->display(function () {
////            $categoryIds = explode(',', $this->cate_id);
//            $categories = Category::whereIn('id', $this->cate_id)->pluck('category_name')->toArray();
//
//            return implode(', ', $categories);
//        })->label();


        $grid->batchActions(function ($batch) {
//            $batch->disableDelete();
        });

        $grid->actions(function ($actions) {
            $actions->disableView();
        });


        $grid->paginate(10);
        return $grid;
    }

    public function store()
    {
        return $this->form()->saving(function (Form $form) {
            // 清空缓存
            $form->multipleSteps()->flushStash();
            // 拦截保存操作
            return response(
                $form->multipleSteps()
                    ->done()
                    ->render()
            );
        })->store();
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

        $steps  = [
            'basic'=>Steps\OfferBasic::class,
            'track'  => Steps\OfferTrack::class,
            'other' => Steps\OfferSet::class,
        ];

        return $content
            ->title('注册用户')
            ->body(MultipleSteps::make($steps));


    }

    /**
     *
     * Offer List
     * @param $content
     * @param $request
     *
     * @return view
     *
     */
    public function showV2(Content $content, Request $request)
    {
        Admin::disablePjax();

//        echo 123;exit;

        $data = [];


        $currentUser = auth()->user(); // 获取当前登录用户的模型对象
        $admin_id = $currentUser->id; // 输出当前用户名称

        $roles = $currentUser->roles; // 获取当前用户的角色集合


        $role = '';
        foreach ($roles as $role) {
            $role = $role->id;
        }


        $where = [];
        $user_id = Admin::user()->id;
        if (!Admin::user()->isAdministrator()) {
            $where['admin_roles_id'] = $role;
        }


        $geos_list = Geos::get()->toArray();
        $category_list = Category::get()->toArray();


        //数据分为左右处理
        $filteredDataArray = Offer::where($where)->get()->toArray();//奇数


        if (!empty($filteredDataArray)) {
            foreach ($filteredDataArray as $key => $value) {
                $accepted_area = Geos::whereIn('id', $value['accepted_area'])->select('country')->get()->toArray();
                $accepted_area_data = '';
                foreach ($accepted_area as $k => $v) {
                    $accepted_area_data .= $v['country'] . ',';
                }

                $filteredDataArray[$key]['accepted_area'] = trim($accepted_area_data, ',');
                $track_cate = OfferTracksCates::whereIn('id', $value['track_cate_id'])->select('id', 'track_cate')->get()->toArray();
                $delivery_info = Delivery::where('status', 1)->get()->toArray();
                $delivery_link = !empty($delivery_info[0]['delivery_link']) ? $delivery_info[0]['delivery_link'] : '';

                $fieldToSwap = 'track_cate';
                $swappedArray = array_map(function ($key1, $item) use ($fieldToSwap) {
                    return [$item[$fieldToSwap] => array_merge(['key' => $key1], $item)];
                }, array_keys($track_cate), $track_cate);
                // 将结果数组进行合并
                $finalArray = array_merge(...$swappedArray);
                foreach ($track_cate as $k => $v) {
                    $track_list = OfferTracks::where('track_type_id', $v['id'])->get()->toArray();  // $finalArray[$k]

                    foreach ($track_list as $x => $y) {
                        $param = '/api/offers/jump?admin_id=' . $admin_id . '&cateid=' . $v['id'] . '&offer_id=' . $value['id'] . '&track_id=' . $y['id'];

                        $track_list[$x]['track_link'] = $delivery_link . $param;
                        $track_list[$x]['offersDomain'] = $delivery_link;

                        $land_link = LandPage::where('id', $y['land_id'])->value('land_link');
                        $track_list[$x]['land_link'] = !empty($land_link) ? $land_link : '';

                    }
                    $finalArray[$v['track_cate']] = $track_list;
//                    $track_offersDomain = array_merge($track_list,$track_list);
                }


                $filteredDataArray[$key]['track_list'] = $finalArray;
                $filteredDataArray[$key]['offersDomain'] = Delivery::where('status', 1)->get()->toArray();
                $filteredDataArray[$key]['creatives'] = Creatives::whereIn('id', $value['creatives_id'])->get()->toArray();

            }

        } else {
            $filteredDataArray = [];
        }

        $filteredDataArray = array_values($filteredDataArray);
//        $filteredDataArrayCopy = array_values($filteredDataArrayCopy);
        $data = [
            'offer' => $filteredDataArray,
            'geos_list' => $geos_list,
            'category_list' => $category_list,
//            'offer1' => $filteredDataArrayCopy,
        ];


        return $content->title("Offers")->view("admin/offers/show-v2", compact('data'));
    }

    /**
     *
     *
     * offer class
     *
     */
    public function offer(Request $request)
    {

        $currentUser = auth()->user(); // 获取当前登录用户的模型对象
        $admin_id = $currentUser->id; // 输出当前用户名称
        $roles = $currentUser->roles; // 获取当前用户的角色集合


        $role = '';
        foreach ($roles as $role) {
            $role = $role->id;
        }

//echo 123;exit;

        $where = [];
        $user_id = Admin::user()->id;

        if(!Admin::user()->isAdministrator()){
//            $where['admin_roles_id'] = $role;
            $whereRole = "FIND_IN_SET($role, offers.admin_roles_id)";
        }else{
            $whereRole = '1=1';
        }




        $step = $request->input("step");

        if ($step == 'offers_tab_pixels') {

            return 123;
        }

        if ($step == 'show_all_offers') {
            $result = [];

            $result['network'] = "6546";
            $offer_links = [];
            $offer_links['AirPhones'] = [];
            $offer_links['BarXStop'] = [];
            $offer_links['GX SmartWatch'] = [];
            $offer_links['NeckMassager'] = [];
            $offer_links['OxyBreath Pro'] = [];
            $offer_links['SilentSnore'] = [];
            $offer_links['TotalShield Max'] = [];
            $offer_links['WIFI UltraBoost'] = [];
            $offer_links['XWatch'] = [];
            $offer_links['Xone Phone'] = [];
            $result['offer_links'] = $offer_links;
            $offers = [];

            $items = Offer::where($where)

//                ->whereRaw("FIND_IN_SET($role, admin_roles_id)")
//                ->whereIn('id',[69,107])
                ->whereRaw($whereRole)
                ->get()
                ->toArray();


//            print_r("<pre/>");
//            print_r($items);exit;

            foreach ($items as $key => $item) {


                $offer['htmlTrackingLinks'] = $this->track1($key, $item);

                $offer = [];
                $offer['data'] = [];


                $offer['data']['creative'] = '';//offer新建字段,暂时留空，赋值会报错
                $offer['data']['creative_description'] = $this->creative($item['creative_content']);//拼接成html
                $offer['data']['description'] = $item['des'];     //使用富文本编辑器
                $offer['data']['geo'] = $this->geo($item['accepted_area']);
                $offer['data']['geo_description'] = $item['geo_description'];
                $offer['data']['tracking'] = $this->track($item['id']);


                $offer['htmlProductsDataFeed'] = $this->htmlProduct($key, $item);
                //$offer['htmlTrackingLinks'] = $this->htmlTrack($key, $item['id']);
                $offer['htmlTrackingLinks'] = $this->track1($key, $item);


                $offer['id'] = $item['id'];
                $offer['image'] = env('APP_URL') . '/storage/' . $item['image'];
                $offer['name'] = $item['short_name'];


                $offer['offers_categories_ids'] = $item['cate_id'];
                $offer['payout'] = !empty($item['offer_price']) ? $item['offer_price'] :0;

                $offer['payout_percent'] = null;
                $offer['per_act'] = "Per Sale";

                $offer['short_name'] = $item['short_name'];
                $offer['show_name'] = $item['main_country'].'-'.$item['offer_name'].'-'.$item['id'];


                if ($item['offer_status'] == 1) {
                    $status = 'Live';
                } else {
                    $status = 'Paused';
                }

                $offer['status'] = $status;
                $offers[] = $offer;
            }


            $result['offers'] = $offers;
            $offer_data = [];
            $offer_data[6546] = $offer_links;
            $result['ofers_data'] = $offer_data;

            return response()->json($result);
        }
    }


    protected function offer_des()
    {

        $data = '<p>
                <strong>E-commerce - CozyTime Pro INTL - All Languages - EXCLUSIVE</strong>
                </p>

                <p>A seasonal offer with a high potential. Start promoting today by targeting cold countries, winter is the best moment for maximizing your conversions with this offer.</p>
                <p>Pixel fires on sale,</p>
                <p>All traffic accepted, except for incentive.</p>
                <p>All major payment methods are accepted.</p>';
    }

    /**
     * offer creative
     */
    protected function creative($data)
    {

        if (!empty($data)) {
            $des = '';
            foreach ($data as $key => $value) {
                $des .= '<p>' . $value['creatives_name'] . ':</p><p>
                <a href="' . $value['creatives_link'] . '" target="_blank">' . $value['creatives_link'] . '</a>
                </p>';
            }
            return $des;
        }

        return '';

    }

    /**
     * offer 适用国家
     */
    protected function geo($accepted_area)
    {
        $data = Geos::whereIn('id', $accepted_area)->get('full_country_name_en')->toArray();
        $data = array_column($data, 'full_country_name_en');
        return $data;

    }


    /**
     * offer 所有的link
     */
    protected function track($offer_id)
    {

        $currentUser = auth()->user();
        $admin_id = $currentUser->id; // 输出当前用户名称
        $roles = $currentUser->roles; // 获取当前用户的角色集合

        $role = '';
        foreach ($roles as $role) {
            $role = $role->id;
        }


        $where = [];
        $user_id = Admin::user()->id;

        if(!Admin::user()->isAdministrator()){
//            $where['admin_roles_id'] = $role;
            $whereRole = "FIND_IN_SET($role, offers.admin_roles_id)";
        }else{
            $whereRole = '1=1';
        }



        $track_info = Offer::where('id', $offer_id)
            ->whereRaw($whereRole)
            ->first()->toArray();

        if (!empty($track_info)) {

            $track_link = OfferTracks::where('offer_id', $offer_id)
                ->select('id', 'track_name as tracking_title', 'track_link as tracking_link', 'offer_id')
                ->get()
                ->toArray();



//            print_r($track_link);exit;


            $Delivery_list = Delivery::where('status',1)->orderBy('id','asc')->get()->first();
            if(!empty($Delivery_list)){
                $delivery_link = $Delivery_list['delivery_link'];
            }else{
                $delivery_link = '';
            }

            if (!empty($track_link)) {

                foreach ($track_link as $x => $y) {
                    $param = '/api/offers/jump?admin_id=' . $admin_id . '&offer_id=' . $offer_id . '&track_id=' . $y['id'];

                    if($track_info['offer_status']==1){
                        $offer_show = 'true';
                    }else{
                        $offer_show = 'false';
                    }
                    $track_link_list[$x]['show_offer'] = $offer_show;
                    $track_link_list[$x]['tracking_link'] = $delivery_link . $param;
                    $track_link_list[$x]['tracking_title'] = $y['tracking_title'];
                }

            } else {
                $track_link_list = [];
            }

        } else {
            $track_link_list = [];
        }

        return $track_link_list;
    }

    protected function htmlProduct($key, $offer)
    {

        $offersDomain = Delivery::where('status', 1)->get()->toArray();

        $data1 = ' <div class="tab-pane" id="tab' . $key . 'ProductsFeed">
                                    <div class="row">
                                    <div class="col-md-12">
                                    ' . $offer['product_feed_des'] . '
                                    </div>
                                    <div class="col-md-12"><!-- dropdown domains -->
                                    <div class="btn-group m-b-30">
                                    <a class="btn btn-success dropdown-toggle m-b-5" data-toggle="dropdown" href="#">Select your Products Feed domain<span class="caret"></span></a>
                                    <ul class="dropdown-menu domains-menu domains-menu-feed">';

//        var_dump($offersDomain);exit;

        if (!empty($offersDomain)) {
            $offersDomainList = '';
            foreach ($offersDomain as $key => $value) {
                $offersDomainList .= '<li><a href="#" class="offersDomain" data-domain="' . $value['delivery_link'] . '">' . $value['delivery_link'] . '</a></li>';
            }
        }else{
            $offersDomainList = '';
        }

        $data2 = $offersDomainList;
        $data3 = '</ul></div><!-- end dropdown domains --></div>';
        $product_feed = ProductsFeed::whereIn('id', $offer['product_feed_id'])->get()->toArray();

        if (!empty($product_feed)) {
            $data4 = '';
            foreach ($product_feed as $k => $v) {
                $data4 .= '<div class="col-md-12">
                                    <div>' . $v['title'] . '</div>
                                    <input readonly type="text" class="form-control trecking_link clipboard-ProductsFeed-' . $offer['id'] . '-'.$v['id'] .' dynamicDomainTrackingLink" value="' . $v['link'] . '">
                                    <a href="' . $v['link'] . '" target="_blank" class="dynamicDomainTrackingLink"><i class="icon ion-eye pull-right"></i></a>
                                    <button class="copp pull-right btn btn-success btn-cons" data-clipboard-action="copy" data-clipboard-target=".clipboard-ProductsFeed-' . $offer['id'] . '-'.$v['id'].'">Copy</button>
                                    </div>';
            }

        } else {
            $data4 = '';
        }

        $data5 = '</div></div>';
        $data = $data1 . $data2 . $data3 . $data4 . $data5;

        return $data;

    }

    /**
     *
     */
    public function intelligence(Request $request)
    {


        $currentUser = auth()->user(); // 获取当前登录用户的模型对象
        $admin_id = $currentUser->id; // 输出当前用户名称

        $roles = $currentUser->roles; // 获取当前用户的角色集合
        $role = '';
        foreach ($roles as $role) {
            $role = $role->id;
        }

        if(!Admin::user()->isAdministrator()){
//            $where['admin_roles_id'] = $role;
            $whereRole = "FIND_IN_SET($role, o.admin_roles_id)";
        }else{
            $whereRole = '1=1';
        }


        $where = [];
        $step = $request->input("step");
        $options = $request->input("options");

//        print_r($options);exit;



        if($step=='intelligence_offers'){
            $start = date('Y-m-d 00:00:00', strtotime($options['start']));
            $end = date('Y-m-d 23:59:59', strtotime($options['end']));
            $startDate = $start;
            $endDate = $end;
            $geos = $options['filter']['geo'];

//            var_dump($geos);exit;

            if(!empty($geos)){
                $where[] = [function ($query) use ($geos) {
                    $query->whereIn('g.country', $geos);
                }];
            }


//            echo $geos;exit;

            //查询当前月的销售金额记录并按数量降序排列
            $offer_sale = OfferLog::whereBetween('offer_logs.created_at', [$startDate, $endDate])
                ->leftJoin('geos AS g', 'offer_logs.country_id', '=', 'g.id')
                ->leftJoin('offers as o','offer_logs.offer_id','=','o.id')
                ->whereRaw($whereRole)
                ->where($where)
                ->where('offer_logs.status',2)
                ->select(DB::raw('SUM(offer_logs.revenue) as total_sales'), 'offer_logs.offer_id')
                ->groupBy('offer_logs.offer_id')
                ->orderByDesc('total_sales')
                ->take(3)
                ->get()
                ->toArray();

//            print_r($offer_sale);exit;


            $offer_log_count = OfferLog::whereBetween('offer_logs.created_at', [$startDate, $endDate])
                ->leftJoin('offers as o','offer_logs.offer_id','=','o.id')
                ->whereRaw($whereRole)
                ->where('offer_logs.status',2)
                ->where($where)
                ->sum('offer_logs.revenue');

//            var_dump($offer_log_count);exit;

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



            //排名前三的offer
            $offer_count = OfferLog::whereBetween('offer_logs.created_at', [$startDate, $endDate])
                ->leftJoin('offers as o','offer_logs.offer_id','=','o.id')
                ->where($where)->where('offer_logs.status',2)
                ->whereRaw($whereRole)

                ->select(DB::raw('count(offer_logs.id) as total_quantity'), 'offer_logs.offer_id')
                ->whereRaw("FIND_IN_SET($role, o.admin_roles_id)")
                ->groupBy('offer_logs.offer_id')
                ->orderByDesc('total_quantity')
                ->take(3)
                ->get()
                ->toArray();


            $total_count = OfferLog::where('status',2)->count();

            foreach ($offer_count as $key => $value) {
                $offer_count[$key]['short_name'] = Offer::where('id', $value['offer_id'])->value('short_name');
                $offer_count[$key]['offer_name'] = Offer::where('id', $value['offer_id'])->value('offer_name');
                if($total_count==0){
                    $offer_count[$key]['offer_percent'] = "0%";
                }else{
                    $offer_count[$key]['offer_percent'] = round($value['total_quantity'] / $total_count * 100);

                }
            }


            $short_name = array_column($offer_count, 'short_name');
            $offer_name = array_column($offer_count, 'offer_name');

            $total_quantity = array_column($offer_count, 'total_quantity');
            $offer_percent = array_column($offer_count, 'offer_percent');


            $data = [];
            $data['db_names'] = $short_name;
            $data['link_preview'] = $short_name;
            $data['long_names'] = $offer_name;
            $data['names'] = $short_name;

            if(!empty($offer_percent)){
                $data['vals'] = $offer_percent;
            }



        }



        if ($step == 'intelligence_geos') {

            $start = date('Y-m-d 00:00:00', strtotime($options['start']));
            $end = date('Y-m-d 23:59:59', strtotime($options['end']));
            $short_name = $options['filter']['offers'];
            if(!empty($short_name)){
//                $where['o.short_name'] = $short_name;
                $where[] = [function ($query) use ($short_name) {
                    $query->whereIn('short_name', $short_name);
                }];
            }

//            Db::enableQueryLog();


            $offer_top = DB::table('offer_logs AS log')
                ->where('log.status', 2)
                ->where('log.created_at', '>', $start)
                ->where('log.created_at', '<=', $end)
                ->leftJoin('offers AS o', 'log.offer_id', '=', 'o.id')
//                ->whereRaw("FIND_IN_SET($role, o.admin_roles_id)")
                ->whereRaw($whereRole)

                ->where($where)
                ->select(DB::raw('count(log.id) as offer_total'), 'log.country_id')
                ->groupBy('log.country_id')
                ->orderByDesc('offer_total')
                ->get()
                ->toArray();

//          $log = DB::getQueryLog();


//          print_r($log);exit;

            if (!empty($offer_top)) {

                $offer_sale_list = array_column($offer_top, 'offer_total');
                $offer_total_sale = array_sum($offer_sale_list);

                $country_count = [];
                foreach ($offer_top as $key => $value) {
                    $country_count[$key]['names'] = Geos::where('id', $value->country_id)->value('country');
                    $country_count[$key]['vals'] = $value->offer_total;

                    if($offer_total_sale==0){
                        $country_count[$key]['percent'] =0;
                    }else{
                        $country_count[$key]['percent'] = round($value->offer_total / $offer_total_sale * 100, 2);
                    }
                }
            } else {
                $country_count = [];
            }


            $names = array_column($country_count, 'names');
            $vals = array_column($country_count, 'percent');

            $data = [];

//            $data['iso'] = ['Australia' => "AU",'Austria'=>"AT"];
//            $data['names'] = [0=>"Israel",1=>"United States"];
//            $data['vals'] = [31,19];

            $data['iso'] = ['荷兰' => "GB",'null'=>"123"];
            $data['names'] = $names;

            if(!empty($vals)){
                $data['vals'] = $vals;

            }

        }


//        var_dump($step);exit;
        if($step=='intelligence_opportunity'){


//            print_r( date('Y-m-d 23:59:59'));exit;

            $total_count = DB::table('offer_logs as log')
                ->leftJoin('offers AS o', 'log.offer_id', '=', 'o.id')
                ->where('log.created_at', '>', date('Y-m-d 00:00:00',strtotime('-7 days')))
                ->where('log.created_at', '<=', date('Y-m-d 23:59:59'))
//                ->whereRaw("FIND_IN_SET($role, o.admin_roles_id)")
                ->whereRaw($whereRole)

                ->where('status', 2)
                ->count();



            $offer_top = DB::table('offer_logs AS log')
                ->where('log.status', 2)
                ->where('log.created_at', '>', date('Y-m-d 00:00:00',strtotime('-7 days')))
                ->where('log.created_at', '<=', date('Y-m-d 23:59:59'))
                ->leftJoin('offers AS o', 'log.offer_id', '=', 'o.id')
                ->whereRaw($whereRole)

//                ->whereRaw("FIND_IN_SET($role, o.admin_roles_id)")
                ->select(DB::raw('count(log.id) as offer_total'), 'o.short_name')
                ->groupBy('o.short_name')
                ->orderByDesc('offer_total')
                ->limit(1)
                ->get()
                ->first();

//            var_dump($offer_top);exit;

            if(!empty($offer_top)){
                $offer_name = $offer_top->short_name;
                $percent =round($offer_top->offer_total /$total_count,2);
            }else{
                $percent = 0;
                $offer_name = [];
            }

//            $percent = round(/$total_count)

            $data = [];
            $data['link_preview'] = "https://popularhitech.com/intl/?prod=cooledge&net={NETWORK}&aff={AFFID}&sid={SUBID}&cid={CLICKID}";
            $data['offer'] = $offer_name;
            $data['percent'] = $percent;
            $data['result'] = "graph";
        }

        return response()->json($data);
    }


    /**
     * Offer List
     * @param mixed $id
     * @return Show
     */
    public function show($id, Content $content)
    {

        Admin::disablePjax();

        $currentUser = auth()->user(); // 获取当前登录用户的模型对象
        $admin_id = $currentUser->id; // 输出当前用户名称

        $roles = $currentUser->roles; // 获取当前用户的角色集合

        $role = '';
        foreach ($roles as $role) {
            $role = $role->id;
        }


        $geos_list = Geos::get()->toArray();
        $category_list = Category::get()->toArray();


        //数据分为左右处理
        $filteredDataArray = Offer::whereNull('deleted_at')
            ->whereRaw("FIND_IN_SET($role, admin_roles_id)")
            ->get()->toArray();//奇数


//        $filteredDataArray = Offer::whereNull('deleted_at')->whereRaw('MOD(id, 2) = 1')->get()->toArray();//奇数
//        $filteredDataArrayCopy = Offer::whereNull('deleted_at')->whereRaw('MOD(id, 2) = 0')->get()->toArray();//偶数


        if (!empty($filteredDataArray)) {
            foreach ($filteredDataArray as $key => $value) {
                $accepted_area = Geos::whereIn('id', $value['accepted_area'])->select('country')->get()->toArray();
                $accepted_area_data = '';
                foreach ($accepted_area as $k => $v) {
                    $accepted_area_data .= $v['country'] . ',';
                }

                $filteredDataArray[$key]['accepted_area'] = trim($accepted_area_data, ',');
                $track_cate = OfferTracksCates::whereIn('id', $value['track_cate_id'])->select('id', 'track_cate')->get()->toArray();
                $delivery_info = Delivery::where('status', 1)
                    ->whereRaw("FIND_IN_SET($role, admin_roles_id)")
                    ->get()->toArray();
                $delivery_link = !empty($delivery_info[0]['delivery_link']) ? $delivery_info[0]['delivery_link'] : '';

                $fieldToSwap = 'track_cate';
                $swappedArray = array_map(function ($key1, $item) use ($fieldToSwap) {
                    return [$item[$fieldToSwap] => array_merge(['key' => $key1], $item)];
                }, array_keys($track_cate), $track_cate);
                // 将结果数组进行合并
                $finalArray = array_merge(...$swappedArray);
                foreach ($track_cate as $k => $v) {
                    $track_list = OfferTracks::where('track_type_id', $v['id'])->get()->toArray();  // $finalArray[$k]

                    foreach ($track_list as $x => $y) {
                        $param = '/api/offers/jump?admin_id=' . $admin_id . '&cateid=' . $v['id'] . '&offer_id=' . $value['id'] . '&track_id=' . $y['id'];

                        $track_list[$x]['track_link'] = $delivery_link . $param;
                        $track_list[$x]['offersDomain'] = $delivery_link;

                        $land_link = LandPage::where('id', $y['land_id'])->value('land_link');
                        $track_list[$x]['land_link'] = !empty($land_link) ? $land_link : '';

                    }
                    $finalArray[$v['track_cate']] = $track_list;
//                    $track_offersDomain = array_merge($track_list,$track_list);
                }


                $filteredDataArray[$key]['track_list'] = $finalArray;
                $filteredDataArray[$key]['offersDomain'] = Delivery::where('status', 1)
                    ->whereRaw("FIND_IN_SET($role, admin_roles_id)")
                    ->get()->toArray();
                $filteredDataArray[$key]['creatives'] = Creatives::whereIn('id', $value['creatives_id'])->get()->toArray();

            }

        } else {
            $filteredDataArray = [];
        }
//
//        print_r("<pre/>");
//        print_r($filteredDataArray);exit;

        $filteredDataArray = array_values($filteredDataArray);
//        $filteredDataArrayCopy = array_values($filteredDataArrayCopy);
        $data = [
            'offer' => $filteredDataArray,
            'geos_list' => $geos_list,
            'category_list' => $category_list,
//            'offer1' => $filteredDataArrayCopy,
        ];

//        print_r("<pre/>");
//        print_r($data);exit;

        return $content->title('Offers')->view('offer.show', compact('data'));
    }


    function mergeArraysByFieldValue($array, $field,$admin_id) {
        $result = [];

        // 遍历输入的二维数组
        foreach ($array as $item) {
            $key = $item[$field];
            // 如果结果数组中不存在该键名，则初始化为一个空数组
            if (!isset($result[$key])) {
                $result[$key] = [];
            }

            $delivery_info = Delivery::where('status', 1)
                ->get()->toArray();

            $delivery_link = !empty($delivery_info[0]['delivery_link']) ? $delivery_info[0]['delivery_link'] : '';
            $param = '/api/offers/jump?admin_id=' . $admin_id .  '&offer_id=' . $item['offer_id'] . '&track_id=' . $item['id'];
            $item['track_link'] = $delivery_link . $param;

            // 将当前数组添加到对应的键名下
            $result[$key][] = $item;
        }
        return $result;
    }





    protected function track1($key, $offer)
    {

        $currentUser = auth()->user(); // 获取当前登录用户的模型对象
        $admin_id = $currentUser->id; // 输出当前用户名称

        $roles = $currentUser->roles; // 获取当前用户的角色集合
        $role = '';
        foreach ($roles as $role) {
            $role = $role->id;
        }

        if(!Admin::user()->isAdministrator()){
//            $where['admin_roles_id'] = $role;
            $whereRole = "FIND_IN_SET($role, admin_roles_id)";
        }else{
            $whereRole = '1=1';
        }


        $track_cate = OfferTracksCates::whereIn('id', $offer['track_cate_id'])->select('id', 'track_cate')->get()->toArray();




      $track_content =  OfferTracks::where('offer_id',$offer['id'])->get()->toArray();


//      print_r($track_content);exit;
      if(!empty($track_content)){
          $result = $this->mergeArraysByFieldValue($track_content, 'tab',$admin_id);
      }else{
          $result = [];
      }






        $delivery_info = Delivery::where('status', 1)
            ->whereRaw($whereRole)
            ->get()->toArray();

//        $delivery_info = Offer::where('offer_status',1)->whereNotNull('offers_domain')->select('offers_domain')->get()->toArray();
//
//
//        print_r($delivery_info);exit;



        $delivery_link = !empty($delivery_info[0]['delivery_link']) ? $delivery_info[0]['delivery_link'] : '';

        $fieldToSwap = 'track_cate';
        $swappedArray = array_map(function ($key1, $offer) use ($fieldToSwap) {
            return [$offer[$fieldToSwap] => array_merge(['key' => $key1], $offer)];
        }, array_keys($track_cate), $track_cate);
        // 将结果数组进行合并
        $finalArray = array_merge(...$swappedArray);
        foreach ($track_cate as $k => $v) {
            $track_list = OfferTracks::where('track_type_id', $v['id'])->get()->toArray();  // $finalArray[$k]

            foreach ($track_list as $x => $y) {
                $param = '/api/offers/jump?admin_id=' . $admin_id . '&cateid=' . $v['id'] . '&offer_id=' . $offer['id'] . '&track_id=' . $y['id'];

                $track_list[$x]['track_link'] = $delivery_link . $param;
                $track_list[$x]['offersDomain'] = $delivery_link;

                $land_link = LandPage::where('id', $y['land_id'])->value('land_link');
                $track_list[$x]['land_link'] = !empty($land_link) ? $land_link : '';

            }
            $finalArray[$v['track_cate']] = $track_list;
                    $track_offersDomain = array_merge($track_list,$track_list);
        }


//print_r($finalArray);exit;
/*
        foreach ($result as $x => $y) {



            $param = '/api/offers/jump?admin_id=' . $admin_id . '&offer_id=' . $offer['id'] . '&track_id=' . $y['id'];

            $track_list[$x]['track_link'] = $delivery_link . $param;
            $track_list[$x]['offersDomain'] = $delivery_link;

            $land_link = LandPage::where('id', $y['land_id'])->value('land_link');
            $track_list[$x]['land_link'] = !empty($land_link) ? $land_link : '';

        }
    */

//        $offer['track_list'] = $finalArray;

        $offer['track_list'] = $result;

//        print_r($result);exit;

        $offer['offersDomain'] = Delivery::where('status', 1)
            ->whereRaw($whereRole)
            ->get()->toArray();


        $data1 = '<div class="tab-pane" id="tab' . $key . 'Tracking">
	<div class="row">
		<div class="col-md-12">
			<br />
			<p>
				' . $offer['track_des'] . '
			</p>
			<!-- dropdown domains -->
			<div class="btn-group m-b-30">
				<a class="btn btn-success dropdown-toggle m-b-5" data-toggle="dropdown"
				href="#">
					Select your tracking domain
					<span class="caret"></span>
				</a>
				<ul class="dropdown-menu domains-menu">';

        if (isset($offer['offersDomain']) && !empty($offer['offersDomain'])) {

            $data2 = '';
            foreach ($offer['offersDomain'] as $x => $y) {
                $data2 .= '<li><a href="#" class="offersDomain" data-domain="' . $y['delivery_link'] . '">' . $y['delivery_link'] . '</a></li>';
            }
        } else {
            $data2 = '';
        }


        $data3 = '</ul>
			</div>
			<!-- end dropdown domains -->
			<div class="row">
				<div class="col-md-12">
					<!-- filter tabs -->
					<div class="tabbable tabs-left tabs-bg">
					<ul class="nav nav-tabs" role="tablist">';

        if (isset($offer['track_list']) && !empty($offer['track_list'])) {

            $index = 0;
            $data4 = '';
            foreach ($offer['track_list'] as $x => $y) {

//                            $data4 .= '<li class="active"><a href="#provenorderpages-'.$x.'" role="tab" data-toggle="tab">'.$x.'</a></li>';


                $x1 =  str_replace(' ', '', $x);


                if ($index == 0) {
                    $data4 .= '<li class="active"><a href="#provenorderpages-' . $x1 . $key . '" role="tab" data-toggle="tab">' . $x . '</a></li>';
                } else {
                    $data4 .= '<li><a href="#provenorderpages-' . $x1 . $key . '" role="tab" data-toggle="tab">' . $x . '</a></li>';
                }

                $index++;
            }
        } else {
            $data4 = '';
        }

        $data5 = '</ul><div class="tab-content">';

        $track1 = '';
        $track = '';
        $data66 = '';
        $index1 = 0;
        foreach ($offer['track_list'] as $key3 => $item3) {

            $key3 =  str_replace(' ', '', $key3);

            if ($index1 == 0) {
                $track1 = '<div class="tab-pane active" id="provenorderpages-' . $key3 . $key . '">';
            } else {
                $track1 = '<div class="tab-pane" id="provenorderpages-' . $key3 . $key . '">';
            }


            $row = '<div class="row"><div class="col-md-12">';
            $data11 = '';


            $track_id = 0;
            foreach ($item3 as $key4 => $item4) {

                $param = '?admin_id=' . $admin_id . '&aff={AFFID}&sid={SUBID}&cid={CLICKID}&offer_id=' . $offer['id'] . '&track_id=' . $track_id;




//                $item4['track_link'] = $item4['track_link'];
                $data11 .= '<div class="padding-for_links"><div>' . $item4['track_name'] . '</div><input  style="width: calc(100% - 100px)" readonly="" type="text" class="form-control trecking_link clipboard-' . $offer['id'] . '-' . $index1 . '-' . $key4 . ' dynamicDomainTrackingLink" value="' . $item4['track_link'] . '"><a target="_blank"  href="' . $item4['track_link'] . '"  class=" dynamicDomainTrackingLink"><i class="icon ion-ios-eye pull-right" style="font-size: 30px"></i></a><button class="copp pull-right btn btn-success btn-cons copy-button" data-clipboard-action="copy" data-clipboard-target=".clipboard-' . $offer['id'] . '-' . $index1 . '-' . $key4 . '">Copy</button></div>';

            }
            $index1++;

            $data_div = ' </div></div></div>';
            $data66 .= $track1 . $row . $data11 . $data_div;
        }





        $data7 = '</div>
				</div>
				<!-- end filter tabs -->
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>
</div>';

        $data = $data1 . $data2 . $data3 . $data4 . $data5 . $data66 . $data7;
        return $data;
    }




    public function edit($id, Content $content)
    {


        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->form($id)->edit($id));
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {

        $form = new Form(new Offer());

//        $form->text('short_name', __('Short name'))->required();
        $form->text('offer_name', __('Offer name'))->required();
        $form->text('main_country', __('Main country'))->required();

        $form->image('image', __('Image'));
        $form->currency('offer_price', __('Payout'))->required();
        $form->switch('offer_status', __('Offer status'))->default(1);
        $form->textarea('des', __('Offer Des'));
        $form->listbox('accepted_area', __('Accepted Area'))->options(Geos::all()->pluck('country', 'id'))->required();

        $form->multipleSelect('cate_id', __('Category'))->options(Category::all()->pluck('category_name', 'id'));
        $form->textarea('track_des', __('Track Des'));

//        $form->multipleSelect('track_cate_id', __('Track Cate'))->options(OfferTracksCates::all()->pluck('track_cate', 'id'))->required();

//        $form->textarea('creative', __('Creative Des'));

//        $form->textarea('product_feed_des', __('ProductFeed Des'));
//        $form->multipleSelect('product_feed_id', __('ProductFeed'))->options(ProductsFeed::all()->pluck('title', 'id'));



        $form->table('track_content', __('Track Content'), function ($table) {
            $table->select('tab')->options(TabType::all()->pluck('tab_name', 'tab_name'))->required();
            $table->text('track_name');
            $table->text('land_link');

        });

//        $form->textarea('creative', __('Creatives'));


        $form->table('creative_content', __('Creatives Info'), function ($table) {
            $table->text('creatives_name');
            $table->url('creatives_link');
        });

//        $form->table('offers_domain', __('Offer Domain'), function ($table) {
//            $table->url('offers_domain_link');
//        });

        $form->multipleSelect('admin_roles_id', __('Roles'))->options(Role::all()->pluck('name', 'id'))->required();
        $form->saving(function (Form $form) {
           $offer_id = $form->model()->id;
            $track_content = $form->track_content;

            if(!empty($track_content)){

                sort($track_content);
                $track_list = [];
                foreach ($track_content as $x=>$y){

                    $track_list[$x]['tab'] =$y['tab'];
                    $track_list[$x]['track_name'] =$y['track_name'];
                    $track_list[$x]['land_page'] =$y['land_link'];
                    $track_list[$x]['offer_id'] =$offer_id;
                    $track_list[$x]['random'] =uniqid();
                    $track_list[$x]['created_at'] =date('Y-m-d H:i:s');


//                  $tracnk_info = OfferTracks::where('land_page',$y['land_link'])->get()->first();


                }


                $res1 = OfferTracks::where('offer_id',$offer_id)->delete();
                $res = OfferTracks::insert($track_list);


            }


        });
        return $form;
    }

    // 删除用户操作
    public function del(int $id)
    {
        // 软删除
        Offer::where('id', $id)->update(['status' => 2]);
        Offer::find($id)->delete();

        return ['status' => 2, 'msg' => '删除成功'];
    }


}
