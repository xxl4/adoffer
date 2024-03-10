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

//use Jxlwqq\WangEditor2\Editor;
use Encore\Admin\Form\Field\Editor;

class OfferController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Offer';

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
        $grid->column('offer_status', __('Offer status'))->using(['1' => 'Live', '0' => 'Paused', 2 => 'Del'])->label([
            1 => 'success',
            0 => 'danger',
            2 => 'Del',
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
                $offer['data']['creative_description'] = $this->creative($item['creatives_id']);//拼接成html
                $offer['data']['description'] = $item['des'];     //使用富文本编辑器
                $offer['data']['geo'] = $this->geo($item['accepted_area']);
                $offer['data']['geo_description'] = $item['geo_description'];
                $offer['data']['tracking'] = $this->track($item['id']);


                $offer['htmlProductsDataFeed'] = $this->htmlProduct($key, $item);
                //$offer['htmlTrackingLinks'] = $this->htmlTrack($key, $item['id']);
                $offer['htmlTrackingLinks'] = $this->track1($key, $item);


                $offer['id'] = $item['id'];
                $offer['image'] = env('APP_URL') . '/upload/' . $item['image'];
                $offer['name'] = $item['short_name'];


                $offer['offers_categories_ids'] = $item['cate_id'];
                $offer['payout'] = $item['offer_price'];

                $offer['payout_percent'] = null;
                $offer['per_act'] = "Per Sale";

                $offer['short_name'] = $item['short_name'];
                $offer['show_name'] = $item['offer_name'];


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
    protected function creative($creatives_id)
    {
        $data = Creatives::whereIn('id', $creatives_id)->get()->toArray();
        if (!empty($data)) {
            $des = '';
            foreach ($data as $key => $value) {
                $des .= '<p>' . $value['name'] . ':</p><p>
                <a href="' . $value['link'] . '" target="_blank">' . $value['link'] . '</a>
                </p>';
            }
            return $des;
        }

        $data = array_column($data, 'country');
        return $data;

    }


    /**
     * offer 适用国家
     */
    protected function geo($accepted_area)
    {
        $data = Geos::whereIn('id', $accepted_area)->get('country')->toArray();
        $data = array_column($data, 'country');
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

            $track_link = OfferTracks::whereIn('id', $track_info['track_cate_id'])
                ->select('id', 'track_name as tracking_title', 'track_link as tracking_link', 'offer_id')
                ->get()
                ->toArray();

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


    /***
     *
     *
     *
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


    public function query(Request $request)
    {

        $currentUser = auth()->user(); // 获取当前登录用户的模型对象
        $admin_id = $currentUser->id; // 输出当前用户名称
        $currentUser = auth()->user(); // 获取当前登录用户对象
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

//        print_r($where);exit;


        // 处理表单提交逻辑
        $keyword = $request->input('keyword');
        $category = $request->input('category');
        $geos = $request->input('geos');
        $sort = $request->input('sort');

//        var_dump($geos);exit;


        if (!empty($category)) {
            $category = implode(',', $category);
        } else {
            $category = '';
        }

        if (!empty($geos)) {
            $geos = implode(',', $geos);
        } else {
            $geos = '';
        }


//        $where[] = ['offer_status', '=', 1];
        if (!empty($keyword)) {
            $where[] = ['offer_name', 'like', "%$keyword%"];
        }

        if ($admin_id !== 1 && $admin_id !== 2) {
            $where[] = ['admin_id', '=', $admin_id];
        }


        switch ($sort) {
            case '0':
                # code...
                $field = 'create_at';
                $order = 'desc';
                break;
            case '1':
                # code...
                $field = 'create_at';
                $order = 'asc';
                break;
            case '2':
                # code...
                $field = 'offer_price';
                $order = 'desc';
                break;
            case '3':
                # code...
                $field = 'offer_price';
                $order = 'asc';
                break;
            default:
                # code...
                $field = 'create_at';
                $order = 'desc';
                break;
        }


        $filteredDataArray = Offer::where(function ($query) use ($geos) {
            $values = explode(',', $geos);
            foreach ($values as $value) {
                $query->orWhere('accepted_area', 'like', "%$value%");
            }
        })->where(function ($query) use ($category) {
            $values2 = explode(',', $category);
            foreach ($values2 as $value2) {
                $query->orWhere('cate_id', 'like', "%$value2%");
            }
        })->where($where)->whereNull('deleted_at')
            ->orderBy($field, $order)->get()->toArray();//奇数


//        $filteredDataArrayCopy = Offer::where(function ($query) use ($geos) {
//            $values = explode(',', $geos);
//            foreach ($values as $value) {
//                $query->orWhere('accepted_area', 'like', "%$value%");
//            }
//        })
//            ->where(function ($query) use ($category) {
//                $values2 = explode(',', $category);
//                foreach ($values2 as $value2) {
//                    $query->orWhere('cate_id', 'like', "%$value2%");
//                }
//            })->whereRaw('MOD(id, 2) = 0')->where($where)->whereNull('deleted_at')
//            ->orderBy($field, $order)->get()->toArray();//奇数


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
                }


                $filteredDataArray[$key]['track_list'] = $finalArray;
                $filteredDataArray[$key]['offersDomain'] = Delivery::where('status', 1)->get()->toArray();
                $filteredDataArray[$key]['creatives'] = Creatives::whereIn('id', $value['creatives_id'])->get()->toArray();

            }
            $filteredDataArray = $this->htmlSpliceCopy($filteredDataArray);
        } else {
            $filteredDataArray = '';
        }

        $result = [
            'left_data' => $filteredDataArray,
        ];

        return response()->json($result);
    }


    protected function htmlSpliceCopy($data)
    {
        $currentUser = auth()->user(); // 获取当前登录用户的模型对象
        $admin_id = $currentUser->id; // 输出当前用户名称

        $result = '';
        foreach ($data as $key => $offer) {


            if ($offer['offer_status'] == 1) $lable_status = '<span class="label label-success">Live</span>'; else $lable_status = '<span class="label label-warning">Paused</span>';
            $land = '';
            if (!empty($offer['track_list'])) {
                foreach ($offer['track_list'] as $x => $y) {
                    $land = isset($offer['track_list'][$x][0]['land_link']) ? $offer['track_list'][$x][0]['land_link'] : '';
                }
            }


            $first = '<div class="col-md-12 accord" data-offer_db="KneeBoost Pro"><ul class="nav nav-tabs" role="tablist"><li class="active"><a href="#tab' . $key . 'Offer" role="tab" data-toggle="tab">Summary</a></li><li><a href="#tab' . $key . 'Description" role="tab" data-toggle="tab">Description</a></li><li><a href="#tab' . $key . 'Geos" role="tab" data-toggle="tab">Accepted Geos</a></li><li><a href="#tab' . $key . 'Top_Geos" class="tab_top_geo" role="tab" data-toggle="tab">Top Geos</a></li><li><a href="#tab' . $key . 'Tracking" role="tab" data-toggle="tab">Tracking Links</a></li><li><a href="#tab' . $key . 'ProductsFeed" role="tab" data-toggle="tab">Products Data Feed</a></li><li><a href="#tab' . $key . 'Creative" role="tab" data-toggle="tab">Creatives</a></li><li><a href="##tab' . $key . 'Pixel_Postback" class="offers-tab-pixels" data-offer-id="' . $offer['id'] . '" role="tab" data-toggle="tab">Pixels/Postbacks</a></li></ul><div class="tools"><a href="javascript:;" class="collapse"></a><a href="#grid-config" data-toggle="modal" class="config"></a><a href="javascript:;" class="reload"></a><a href="javascript:;" class="remove"></a></div><div class="tab-content"><div class="tab-pane active" id="tab' . $key . 'Offer"><div class="row column-seperation"><div class="col-md-12"><table class="table table-striped table-flip-scroll cf"><thead class="cf"><tr><th><a href="' . $land . '" target="_blank">' . '<span class="offer-product-img-container" data-original-title="" title=""><img src="' . env('APP_URL') . '/upload/' . $offer['image'] . '"  alt="KneeBoost Pro"></span>Offer Preview<i class="icon ion-ios-eye"></i></a></th><th>Payout</th><th>Status</th></tr></thead><tbody><tr><td width="55%">' . $offer['offer_name'] . '</td><td width="25%">$' . $offer['offer_price'] . ' Per Sale</td><td width="20%">' . $lable_status . '</td></tr></tbody></table></div></div></div><div class="tab-pane" id="tab' . $key . 'Description"><div class="row"><div class="col-md-12"><p></p><p><strong></strong></p><p>"' . $offer['des'] . '"</p><p></p></div></div></div><div class="tab-pane" id="tab' . $key . 'Geos"><div class="row"><div class="col-md-12"><p></p><p>' . $offer['accepted_area'] . '</p></div></div></div><div class="tab-pane top_geos_tab" id="tab' . $key . 'Top_Geos"><div class="row"><div class="col-md-12"><div class="top_geos_graph"><div class="col-xs-12"><div class="row"><div class="col-xs-12 col-md-6 col-lg-4 use_small_padding"><div class="row"><div class="col-xs-12"><select class="list_date select2_list padding_left" data-suffix="geo" style="margin-bottom: 10px;" name="date" id=""><option value="today">Today</option><option value="yester">Yesterday</option><option value="week">Current Week</option><option value="month">Current Month</option><option value="year">Year To Date</option><option value="l_week">Last Week</option><option value="l_month">Last Month</option><option value="calendar">Custom</option></select></div></div></div><div class="col-xs-12 col-md-6 col-lg-4 use_small_padding calendar_padding"><div class="col-xs-4 col-sm-4"><div class="row"><div class="about_color"><p class="about_inputs">Start</p></div></div></div><div class="input-append success col-xs-8 col-sm-8"><div class="row"><input type="text" class="form-control date_start"><span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span></div></div></div><div class="col-xs-12 col-md-6 col-lg-4 use_small_padding calendar_padding"><div class="col-xs-4 col-sm-4"><div class="row"><div class="about_color"><p class="about_inputs">End</p></div></div></div><div class="input-append success col-xs-8 col-sm-8"><div class="row"><input type="text" class="form-control date_end"><span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span></div></div></div><table class="table no-more-tables geo_table"><thead><tr><th style="width:30%">COUNTRY</th><th style="width:20%">Percentage</th><th style="width:50%">Distribution</th></tr></thead><tbody></tbody></table><div style="display:none;" class="geo_date_no_data"><p>Morpheus: Throughout human history, we have been dependent on machines to survive. Fate, it seems, is not without a sense of irony.</p></div></div></div></div></div></div><div class="wait_loader"><img src="images/squares-preloader-gif.svg" alt=""></div></div><div class="tab-pane" id="tab' . $key . 'Tracking"><div class="row"><div class="col-md-12"><p>' . $offer['track_des'] . '</p><div class="btn-group m-b-30"><a class="btn btn-success dropdown-toggle m-b-5" data-toggle="dropdown" href="#">Select your tracking domain<span class="caret"></span></a><ul class="dropdown-menu domains-menu">';

            $track_offersDomain = '';
            foreach ($offer['offersDomain'] as $m => $n) {
                $track_offersDomain .= '<li><a href="#" class="offersDomain" data-domain="' . $n['delivery_link'] . '">' . $n['delivery_link'] . '</a></li>';
            }
            $res = ' </ul></div><div class="row"><div class="col-md-12"><!-- filter tabs --><div class="tabbable tabs-left tabs-bg"><ul class="nav nav-tabs" role="tablist">';

            $index = 0;
            //追踪链接的tab
            $track_tab = '';
            foreach ($offer['track_list'] as $key2 => $item2) {
                if ($index == 0) {
                    $track_tab .= '<li class="active"><a href="#provenorderpages-' . $key2 . $key . '" role="tab" data-toggle="tab">' . $key2 . '</a></li>';
                } else {
                    $track_tab .= '<li><a href="#provenorderpages-' . $key2 . $key . '" role="tab" data-toggle="tab">' . $key2 . '</a></li>';
                }
                $index++;
            }

            $tab_content = '</ul><div class="tab-content">';
            $index1 = 0;

            //追踪链接的tab 对应内容
            $track1 = '';
            $track = '';
            foreach ($offer['track_list'] as $key3 => $item3) {
                if ($index1 == 0) {
                    $track1 = '<div class="tab-pane active" id="provenorderpages-' . $key3 . $key . '">';
                } else {
                    $track1 = '<div class="tab-pane" id="provenorderpages-' . $key3 . $key . '">';
                }

                $index1++;

                $row = '<div class="row"><div class="col-md-12">';
                $data1 = '';
                foreach ($item3 as $key4 => $item4) {
                    $param = '?admin_id=' . $admin_id . '&aff={AFFID}&sid={SUBID}&cid={CLICKID}&offer_id=' . $offer['id'] . '&track_id=' . $item4['id'];
                    $item4['track_link'] = $item4['track_link'] . $param;
                    $data1 .= '

<div class="padding-for_links"><div>' . $item4['track_name'] . '</div><input  style="width: calc(100% - 100px)" readonly="" type="text" class="form-control trecking_link clipboard-0-0-0 dynamicDomainTrackingLink clipboard-1-0-0-1' . $key2 . '-' . $key3 . '-' . $key4 . '" value="' . $item4['track_link'] . '"><a href="' . $item4['track_link'] . '"  class=" dynamicDomainTrackingLink"><i class="icon ion-ios-eye pull-right" style="font-size: 30px"></i></a><a class="copp pull-right btn btn-success btn-cons copy-button" data-clipboard-action="copy" data-clipboard-target=".clipboard-1-0-0-1' . $key2 . '-' . $key3 . '-' . $key4 . '">Copy</a></div></div>';

                }


                $data_div = ' </div>';
                $track .= $track1 . $row . $data1 . $data_div;
            }


            $third = '</div></div><div class="clearfix"></div></div></div></div></div></div><div class="tab-pane" id="tab' . $key . 'ProductsFeed"><div class="row"><div class="col-md-12"><p>Want to Sell on More Channels? Tap into the power of product listing optimization and import our entire product list.</p><p>You can find below the entire catalogue automated Products Data Feed, for easy submit to shopping channels and all the major marketplaces.</p></div><div class="col-md-12"><!-- dropdown domains --><div class="btn-group m-b-30"><a class="btn btn-success dropdown-toggle m-b-5" data-toggle="dropdown" href="#">Select your Products Feed domain<span class="caret"></span></a><ul class="dropdown-menu domains-menu domains-menu-feed"><li><a href="#" class="offersDomain" data-domain="https://urgoodeal.com">https://urgoodeal.com</a></li><li><a href="#" class="offersDomain" data-domain="https://xtechgadget.com">https://xtechgadget.com</a></li><li><a href="#" class="offersDomain" data-domain="https://popularhitech.com">https://popularhitech.com</a></li><li><a href="#" class="offersDomain" data-domain="https://buysmartproduct.com">https://buysmartproduct.com</a></li><li><a href="#" class="offersDomain" data-domain="https://storepx.com">https://storepx.com</a></li><li><a href="#" class="offersDomain" data-domain="https://airportxshop.com">https://airportxshop.com</a></li><li><a href="#" class="offersDomain" data-domain="https://flightxshop.com">https://flightxshop.com</a></li><li><a href="#" class="offersDomain" data-domain="https://blackfridaytechs.com">https://blackfridaytechs.com</a></li><li><a href="#" class="offersDomain" data-domain="https://techchristmasgift.com">https://techchristmasgift.com</a></li><li><a href="#" class="offersDomain" data-domain="https://gadgetronixs.com">https://gadgetronixs.com</a></li><li><a href="#" class="offersDomain" data-domain="https://luxurygadgetx.com">https://luxurygadgetx.com</a></li><li><a href="#" class="offersDomain" data-domain="https://newxventions.com">https://newxventions.com</a></li><li><a href="#" class="offersDomain" data-domain="https://appgogadget.com">https://appgogadget.com</a></li><li><a href="#" class="offersDomain" data-domain="https://todaystech.co">https://todaystech.co</a></li></ul></div><!-- end dropdown domains --></div><div class="col-md-12"><div>Products Feed - All Products</div><input readonly="" type="text" class="form-control trecking_link clipboard-ProductsFeed-0 dynamicDomainTrackingLink" value="https://popularhitech.com/feed?net=6546&amp;aff={AFFID}&amp;sid={SUBID}&amp;cid={CLICKID}"><a href="https://popularhitech.com/feed?net=6546&amp;aff={AFFID}&amp;sid={SUBID}&amp;cid={CLICKID}" target="_blank" class="dynamicDomainTrackingLink"><i class="icon ion-ios-eye pull-right" style="font-size: 30px"></i></a><button class="copp pull-right btn btn-success btn-cons" data-clipboard-action="copy" data-clipboard-target=".clipboard-ProductsFeed-0">Copy</button></div></div></div><div class="tab-pane" id="tab' . $key . 'Creative"><div class="row"><div class="col-md-12">';

            $forth = '';
            foreach ($offer['creatives'] as $k1 => $i1) {
                $forth = '<p></p><p>' . $i1['name'] . '</p><p><a href="' . $i1['link'] . '" target="_blank">' . $i1['link'] . '</a></p>';
                $forth .= $forth;
            }


            $sixth = '</div></div></div><div class="tab-pane" id="tab' . $key . 'Pixel_Postback"><div class="wait_loader offers-tab-pixels-loader" data-offer-id="' . $offer['id'] . '"><img src="images/squares-preloader-gif.svg" alt="preloader"></div><div class="offers-tab-pixels-container" data-offer-id="' . $offer['id'] . '"></div></div></div></div>';
            $result .= $first . $track_offersDomain . $res . $track_tab . $tab_content . $track . $third . $forth . $sixth;


        }


//        print_r($result);
//        exit;


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
        $delivery_info = Delivery::where('status', 1)
            ->whereRaw($whereRole)
            ->get()->toArray();

//        var_dump($delivery_info);exit;

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
//                    $track_offersDomain = array_merge($track_list,$track_list);
        }

//        print_r("<pre/>");


        $offer['track_list'] = $finalArray;
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


                if ($index == 0) {
                    $data4 .= '<li class="active"><a href="#provenorderpages-' . $x . $key . '" role="tab" data-toggle="tab">' . $x . '</a></li>';
                } else {
                    $data4 .= '<li><a href="#provenorderpages-' . $x . $key . '" role="tab" data-toggle="tab">' . $x . '</a></li>';
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
            if ($index1 == 0) {
                $track1 = '<div class="tab-pane active" id="provenorderpages-' . $key3 . $key . '">';
            } else {
                $track1 = '<div class="tab-pane" id="provenorderpages-' . $key3 . $key . '">';
            }


            $row = '<div class="row"><div class="col-md-12">';
            $data11 = '';
            foreach ($item3 as $key4 => $item4) {

                $param = '?admin_id=' . $admin_id . '&aff={AFFID}&sid={SUBID}&cid={CLICKID}&offer_id=' . $offer['id'] . '&track_id=' . $item4['id'];




//                $item4['track_link'] = $item4['track_link'];
                $data11 .= '<div class="padding-for_links"><div>' . $item4['track_name'] . '</div><input  style="width: calc(100% - 100px)" readonly="" type="text" class="form-control trecking_link clipboard-' . $offer['id'] . '-' . $index1 . '-' . $key4 . ' dynamicDomainTrackingLink" value="' . $item4['track_link'] . '"><a href="' . $item4['track_link'] . '"  class=" dynamicDomainTrackingLink"><i class="icon ion-ios-eye pull-right" style="font-size: 30px"></i></a><button class="copp pull-right btn btn-success btn-cons copy-button" data-clipboard-action="copy" data-clipboard-target=".clipboard-' . $offer['id'] . '-' . $index1 . '-' . $key4 . '">Copy</button></div>';

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


    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Offer());
        $form->text('short_name', __('Short name'))->required();
        $form->text('offer_name', __('Offer name'))->required();
        $form->image('image', __('Offer Image'));
        $form->currency('offer_price', __('Payout'))->required();
        $form->switch('offer_status', __('Offer status'))->default(1);
        $form->textarea('des', __('Offer Des'));
        $form->listbox('accepted_area', __('Accepted Area'))->options(Geos::all()->pluck('country', 'id'))->required();
        $form->multipleSelect('cate_id', __('Offer Category'))->options(Category::all()->pluck('category_name', 'id'));
        $form->textarea('track_des', __('Track Des'));
        $form->multipleSelect('track_cate_id', __('Track Cate'))->options(OfferTracksCates::all()->pluck('track_cate', 'id'))->required();

//        $form->textarea('creative', __('Creative Des'));
        $form->multipleSelect('creatives_id', __('Creatives'))->options(Creatives::all()->pluck('name', 'id'))->required();

//        $form->textarea('product_feed_des', __('ProductFeed Des'));
//        $form->multipleSelect('product_feed_id', __('ProductFeed'))->options(ProductsFeed::all()->pluck('title', 'id'));

        $form->multipleSelect('admin_roles_id', __('Roles'))->options(Role::all()->pluck('name', 'id'))->required();




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
