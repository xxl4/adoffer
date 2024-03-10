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
use Encore\Admin\Facades\Admin;
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

class AnalyticsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Analytics';


    public function index(Content $content)
    {
        return $content
            ->header('Analytics')
            ->body(new Box('Bar chart', view('admin.analytics.echat')));
    }


    public function echat(Content $content)
    {

        $currentUser = auth()->user(); // 获取当前登录用户的模型对象
        $net_id = $currentUser->id; // 输出当前用户名称
        $where = [];


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




        $geos_list = Geos::get()->toArray();//国家列表
        $offer_list = Offer::where($where)->get()->toArray();//offer列表


        $startDate = date('Y-m-d 00:00:00', strtotime("-30 days")); //默认最近一周的数据
        $endDate = date('Y-m-d H:i:s');

        //查询当前月的销售金额记录并按数量降序排列
        $offer_sale = OfferLog::whereBetween('offer_logs.created_at', [$startDate, $endDate])
            ->leftJoin('offers AS o', 'offer_logs.offer_id', '=', 'o.id')

            ->whereRaw($whereRole)

            ->where('offer_logs.status',2)
            ->select(DB::raw('SUM(offer_logs.revenue) as total_sales'), DB::raw('count(offer_logs.id) as total_count'),DB::raw('DATE(offer_logs.created_at) as sale_date'))
            ->groupBy('sale_date')
            ->get()
            ->toArray();

        $sale_date = array_column($offer_sale, 'sale_date');
        $total_sales = array_column($offer_sale, 'total_sales');
        $total_count = array_column($offer_sale, 'total_count');



        //排名前三的offer
        $offer_count = OfferLog::whereBetween('offer_logs.created_at', [$startDate, $endDate])
            ->leftJoin('offers AS o', 'offer_logs.offer_id', '=', 'o.id')
            ->whereRaw($whereRole)

            ->where('offer_logs.status',2)
            ->select(DB::raw('count(offer_logs.id) as total_quantity'), DB::raw('sum(offer_logs.revenue) as total_revenue'), 'offer_logs.offer_id')
            ->groupBy('offer_logs.offer_id')
            ->orderByDesc('total_quantity')
            ->take(3)
            ->get()
            ->toArray();

        $count = OfferLog::whereBetween('offer_logs.created_at', [$startDate, $endDate])
            ->leftJoin('offers AS o', 'offer_logs.offer_id', '=', 'o.id')

            ->whereRaw($whereRole)

            ->leftJoin('offers AS o', 'offer_logs.offer_id', '=', 'o.id')
            ->where('offer_logs.status',2)->count();


        $percent = 0;
        foreach ($offer_count as $key => $value) {
            $offer_count[$key]['offer_name'] = Offer::where('id', $value['offer_id'])->value('offer_name');
            $offer_count[$key]['percent'] = round($value['total_quantity'] / $count, 2) * 100;
            $percent += round($value['total_quantity'] / $count, 2) * 100;
        }

        $offer_name = array_column($offer_count, 'offer_name');
        $total_quantity = array_column($offer_count, 'total_quantity');
        $total_revenue = array_column($offer_count, 'total_revenue');

//        print_r("<pre/>");
//        print_r($offer_count);exit;

        // 使用 array_map 和匿名函数进行重组
        $processedData = array_map(function($item) {
            return ['name' => $item['offer_name'], 'value' => $item['total_quantity']];
        }, $offer_count);

        $processedRevenue = array_map(function($item) {
            return ['name' => $item['offer_name'], 'value' => $item['total_revenue']];
        }, $offer_count);


        $processedPercent = array_map(function($item) {
            return ['name' => $item['offer_name'], 'value' => $item['percent']];
        }, $offer_count);





        $topProducts = OfferLog::whereBetween('offer_logs.created_at', [$startDate, $endDate])
            ->leftJoin('offers AS o', 'offer_logs.offer_id', '=', 'o.id')
            ->whereRaw($whereRole)

            ->select('offer_logs.offer_id', DB::raw('SUM(offer_logs.revenue) as total_sales'))
            ->where('offer_logs.status',2)
            ->groupBy('offer_logs.offer_id')
            ->orderByDesc('total_sales')
            ->take(3)
            ->get()->toArray();




        $offer_ids = '';
        $topByCountry = [];
        if (!empty($topProducts)) {

            foreach ($topProducts as $key => $value) {
                $offer_ids .= $value['offer_id'] . ',';
            }

            $topByCountry = OfferLog::whereBetween('created_at', [$startDate, $endDate])
                ->leftJoin('offers AS o', 'offer_logs.offer_id', '=', 'o.id')
                ->whereRaw($whereRole)
                ->where('offer_logs.status',2)
                ->whereIn('offer_logs.offer_id', explode(',', trim($offer_ids, ',')))
                ->select('offer_logs.country_id', DB::raw('SUM(offer_logs.revenue) as country_total_sales'), DB::raw('COUNT(offer_logs.id) as country_total_count'))
                ->groupBy('offer_logs.country_id')
                ->orderByDesc('country_total_sales')
                ->take(10)
                ->get()->toArray();



//            print_r("<pre/>");
//            print_r($topByCountry);exit;


            foreach ($topByCountry as $k => $v) {

                //前十个国家中，前三个商品在所在国家中所占的比例
                $offer_detail = OfferLog::whereBetween('created_at', [$startDate, $endDate])
                    ->leftJoin('offers AS o', 'offer_logs.offer_id', '=', 'o.id')
                    ->whereRaw($whereRole)

                    ->where('offer_logs.status',2)
                    ->whereIn('offer_logs.offer_id', explode(',', trim($offer_ids, ',')))
                    ->where('offer_logs.country_id',$v['country_id'])
                    ->select('offer_logs.offer_id', DB::raw('SUM(offer_logs.revenue) as country_total_sales'), DB::raw('COUNT(offer_logs.id) as country_total_count'))
                    ->groupBy('offer_logs.offer_id')
                    ->orderByDesc('country_total_sales')
                    ->get()->toArray();

//                print_r("<pre/>");
//                print_r($offer_detail);exit;
//                $offer_sum = 0;

                foreach ($offer_detail as $x=>$y){
                    $offer_detail[$x]['offer'] = Offer::where('id',$y['offer_id'])->value('offer_name');

                    if($v['country_total_sales']==0){
                        $offer_detail[$x]['offer_percent'] ='0%';
                    }else{
                        $offer_detail[$x]['offer_percent'] =round($y['country_total_sales']/$v['country_total_sales']*100,2).'%';
                    }

                }


                $topByCountry[$k]['offer_percent_detail'] =  array_map(function($item) {
                    return ['name' => $item['offer'], 'value' => $item['offer_percent']];
                }, $offer_detail);


                $topByCountry[$k]['offer_sales_detail'] =  array_map(function($item) {
                    return ['name' => $item['offer'], 'value' => $item['country_total_sales']];
                }, $offer_detail);

                $topByCountry[$k]['offer_count_detail'] =  array_map(function($item) {
                    return ['name' => $item['offer'], 'value' => $item['country_total_count']];
                }, $offer_detail);


                $topByCountry[$k]['country'] = Geos::where('id', $v['country_id'])->value('country');
                unset($topByCountry[$k]['country_id']);
            }
        }



//        print_r("<pre/>");
//        print_r($topByCountry);exit;

        $country_total_percent = array_map(function($item) {
            return ['name' => $item['country'], 'value' => $item['country_total_sales'],'details'=>$item['offer_percent_detail']];
        }, $topByCountry);


        $country_total_count = array_map(function($item) {
            return ['name' => $item['country'], 'value' => $item['country_total_count'],'details'=>$item['offer_count_detail']];
        }, $topByCountry);

        $country_total_sales = array_map(function($item) {
            return ['name' => $item['country'], 'value' => $item['country_total_sales'],'details'=>$item['offer_sales_detail']];
        }, $topByCountry);


//        print_r("<pre/>");
//        print_r($country_total_sales);exit;



//        $country_total_sales = array_column($topByCountry, 'country_total_sales');
//        $country_total_count = array_column($topByCountry, 'country_total_count');
//        $country_list = array_column($topByCountry, 'country');




        //1、先计算出总销量前三的商品
        //2、在计算出购买这三个商品销量前十的国家

        //柱状图数据
        $data = [
            'sale_date' => $sale_date,
            'total_sales' => $total_sales,
            'total_count'=>$total_count,


            'processedData'=>$processedData,
            'processedRevenue'=>$processedRevenue,
            'processedPercent'=> $processedPercent,


            'offer_name' => $offer_name,
            'total_quantity' => $total_quantity,
            'total_revenue'=>$total_revenue,




//            'country_list' => $country_list,
            'country_total_sales' => $country_total_sales,
            'country_total_count'=>$country_total_count,
            'country_total_percent'=>$country_total_percent

        ];

        $data = response()->json(['data' => $data]);
//        return $content
//            ->header('Chartjs')
//            ->body(view('analytics.echat'));


        return $content
            ->header('Chartjs')
            ->body(new Box('Bar chart', view('analytics.echat', ['data' => $data, 'geos_list' => $geos_list, 'percent' => $percent, 'offer_count' => $offer_count, 'offer_list' => $offer_list])));


    }



    public function query(Request $request)
    {

        $currentUser = auth()->user(); // 获取当前登录用户的模型对象
        $net_id = $currentUser->id; // 输出当前用户名称

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


        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $country = $request->input('geos');
        $offer = $request->input('offer');

        if (!empty($start_date) && !empty($end_date)) {
            $startDate = $start_date . ' 00:00:00';
            $endDate = $end_date . ' 23:59:59';
        } else {
            $startDate = date('Y-m-d 00:00:00', strtotime("-30 days"));
            $endDate = date('Y-m-d 23:59:59');
        }

        $where = [];
//        if (!empty($country)) {
//            $where[] = ['country_id', 'in', $country];
//        }

        if(!empty($country)){
            $where[] = [function ($query) use ($country) {
                $query->whereIn('country_id','in', $country);
            }];
        }

        if(!empty($country)){
            $where[] = [function ($query) use ($offer) {
                $query->whereIn('offer_id','in', $offer);
            }];
        }

//        if (!empty($offer)) {
//            $where[] = ['offer_id', 'in', $offer];
//        }




//        print_r($start_date);exit;


        //查询当前月的销售金额记录并按数量降序排列
        $offer_sale = OfferLog::whereBetween('offer_logs.created_at', [$startDate, $endDate])
            ->leftJoin('offers AS o', 'offer_logs.offer_id', '=', 'o.id')
            ->whereRaw($whereRole)

            ->where('offer_logs.status',2)
            ->where($where)
            ->select(DB::raw('SUM(offer_logs.revenue) as total_sales'), DB::raw('count(offer_logs.id) as total_count'), DB::raw('DATE(offer_logs.created_at) as sale_date'))
            ->groupBy('sale_date')
            ->get()
            ->toArray();


        print_r($offer_sale);exit;

        $sale_date = array_column($offer_sale, 'sale_date');
        $total_sales = array_column($offer_sale, 'total_sales');
        $total_count = array_column($offer_sale, 'total_count');

        //排名前三的offer
        $offer_count = OfferLog::whereBetween('offer_logs.created_at', [$startDate, $endDate])
            ->leftJoin('offers AS o', 'offer_logs.offer_id', '=', 'o.id')
            ->whereRaw($whereRole)
            ->where($where)
            ->where('offer_logs.status',2)
            ->select(DB::raw('count(offer_logs.id) as total_quantity'), DB::raw('sum(offer_logs.revenue) as total_revenue'), 'offer_logs.offer_id')
            ->groupBy('offer_logs.offer_id')
            ->orderByDesc('total_quantity')
            ->take(3)
            ->get()
            ->toArray();

        $count = OfferLog::whereBetween('offer_logs.created_at', [$startDate, $endDate])
            ->leftJoin('offers AS o', 'offer_logs.offer_id', '=', 'o.id')
            ->whereRaw($whereRole)
            ->where('offer_logs.status',2)
            ->count();


        $percent = 0;
        foreach ($offer_count as $key => $value) {
            $offer_count[$key]['offer_name'] = Offer::where('id', $value['offer_id'])->value('offer_name');

            if($count==0){
                $offer_count[$key]['percent'] = 0;
            }else{
                $offer_count[$key]['percent'] = round($value['total_quantity'] / $count, 2) * 100;
            }

            $offer_count[$key]['date'] = $start_date.' - '.$end_date;
            if($count==0){
                $percent += 0;
            }else{
                $percent += round($value['total_quantity'] / $count, 2) * 100;
            }


        }

        $offer_name = array_column($offer_count, 'offer_name');
        $total_quantity = array_column($offer_count, 'total_quantity');

        $processedData = array_map(function($item) {
            return ['name' => $item['offer_name'], 'value' => $item['total_quantity']];
        }, $offer_count);

        $processedRevenue = array_map(function($item) {
            return ['name' => $item['offer_name'], 'value' => $item['total_revenue']];
        }, $offer_count);


        $processedPercent = array_map(function($item) {
            return ['name' => $item['offer_name'], 'value' => $item['percent']];
        }, $offer_count);

        $html_data = $this->html($offer_count);


        $topProducts = OfferLog::whereBetween('offer_logs.created_at', [$startDate, $endDate])
            ->leftJoin('offers AS o', 'offer_logs.offer_id', '=', 'o.id')
            ->whereRaw($whereRole)
            ->where('offer_logs.status',2)
            ->select('offer_logs.offer_id', DB::raw('SUM(offer_logs.revenue) as total_sales'))
            ->groupBy('offer_logs.offer_id')
            ->orderByDesc('total_sales')
            ->take(3)
            ->get()->toArray();


        $offer_ids = '';
        $topByCountry = [];
        if (!empty($topProducts)) {

            foreach ($topProducts as $key => $value) {
                $offer_ids .= $value['offer_id'] . ',';
            }


            $topByCountry = OfferLog::whereBetween('offer_logs.created_at', [$startDate, $endDate])
                ->leftJoin('offers AS o', 'offer_logs.offer_id', '=', 'o.id')
                ->whereRaw($whereRole)
                ->where('offer_logs.status',2)
                ->whereIn('offer_logs.offer_id', explode(',', trim($offer_ids, ',')))
                ->select('offer_logs.country_id', DB::raw('SUM(offer_logs.revenue) as country_total_sales'), DB::raw('Count(offer_logs.id) as country_total_count'))
                ->groupBy('offer_logs.country_id')
                ->orderByDesc('country_total_sales')
                ->take(10)
                ->get()->toArray();




//            print_r("<pre/>");
//            print_r($topByCountry);exit;




            foreach ($topByCountry as $k => $v) {

                //前十个国家中，前三个商品在所在国家中所占的比例
                $offer_detail = OfferLog::whereBetween('offer_logs.created_at', [$startDate, $endDate])
                    ->leftJoin('offers AS o', 'offer_logs.offer_id', '=', 'o.id')
                    ->whereRaw($whereRole)
                    ->where('offer_logs.status',2)
                    ->whereIn('offer_logs.offer_id', explode(',', trim($offer_ids, ',')))
                    ->where('offer_logs.country_id',$v['country_id'])
                    ->select('offer_logs.offer_id', DB::raw('SUM(offer_logs.revenue) as country_total_sales'), DB::raw('COUNT(offer_logs.id) as country_total_count'))
                    ->groupBy('offer_logs.offer_id')
                    ->orderByDesc('country_total_sales')
                    ->get()->toArray();




                foreach ($offer_detail as $x=>$y){
                    $offer_detail[$x]['offer'] = Offer::where('id',$y['offer_id'])->value('offer_name');
                    if($v['country_total_sales']==0){
                        $offer_detail[$x]['offer_percent'] ='0%';
                    }else{
                        $offer_detail[$x]['offer_percent'] =round($y['country_total_sales']/$v['country_total_sales']*100,2).'%';

                    }
                }

                $topByCountry[$k]['offer_percent_detail'] =  array_map(function($item) {
                    return ['name' => $item['offer'], 'value' => $item['offer_percent']];
                }, $offer_detail);


                $topByCountry[$k]['offer_sales_detail'] =  array_map(function($item) {
                    return ['name' => $item['offer'], 'value' => $item['country_total_sales']];
                }, $offer_detail);

                $topByCountry[$k]['offer_count_detail'] =  array_map(function($item) {
                    return ['name' => $item['offer'], 'value' => $item['country_total_count']];
                }, $offer_detail);



                $topByCountry[$k]['country'] = Geos::where('id', $v['country_id'])->value('country');
                unset($topByCountry[$k]['country_id']);
            }
        }

        $country_total_percent = array_map(function($item) {
            return ['name' => $item['country'], 'value' => $item['country_total_sales'],'details'=>$item['offer_percent_detail']];
        }, $topByCountry);

        $country_total_count = array_map(function($item) {
            return ['name' => $item['country'], 'value' => $item['country_total_count'],'details'=>$item['offer_count_detail']];
        }, $topByCountry);

        $country_total_sales = array_map(function($item) {
            return ['name' => $item['country'], 'value' => $item['country_total_sales'],'details'=>$item['offer_sales_detail']];
        }, $topByCountry);

//        print_r("<pre/>");
//        print_r($country_total_sales);exit;



//        $country_total_sales = array_column($topByCountry, 'country_total_sales');
//        $country_total_count = array_column($topByCountry, 'country_total_count');

//        $country_list = array_column($topByCountry, 'country');

//        print_r("<pre/>");
//        print_r($topByCountry);exit;

        $country = [
//            'country_total_sales' => $country_total_sales,
//            'country_list' => $country_list,
//            'country_total_count'=>$country_total_count,


            'country_total_sales' => $country_total_sales,
            'country_total_count'=>$country_total_count,
            'country_total_percent'=>$country_total_percent,
            'html_data'=>$html_data

        ];

        $offer_count = [
            'sale_date' => $sale_date,
            'total_sales' => $total_sales,
            'total_count'=>$total_count,
        ];

        $offer_top = [
            'offer_name' => $offer_name,
            'total_quantity' => $total_quantity,
            'percent' => $percent,
            'processedData'=>$processedData,//转化数量
            'processedRevenue'=> $processedRevenue,//转化金额
            'processedPercent'=>$processedPercent//转化百分比
        ];
        $data = [
            'offer_count' => $offer_count,
            'offer_top' => $offer_top,
            'country' => $country,

        ];
        return response()->json($data);
    }


    //html拼接
    protected function html($res)
    {
        $html = '';
        foreach ($res as $key => $item) {
            $data =  '<tr><td class="text-center">'.$item['date'].'</td><td class="text-center">'.$item['offer_name'].'</td><td class="text-center">'.$item['total_quantity'].'</td><td class="text-center">'.$item['total_revenue'].'</td><td class="text-center">'.$item['percent'].'%</td></tr>';
            $html .= $data;
        }
        return $html;
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
