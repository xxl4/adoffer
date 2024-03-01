<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Creatives;
use App\Models\Delivery;
use App\Models\Geos;
use App\Models\LandPage;
use App\Models\Offer;
use App\Models\OfferTracks;
use App\Models\OfferTracksCate;
use App\Models\OfferTracksCates;
use App\Models\TagsModel;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Widgets\Table;
use Encore\Admin\Actions\RowAction;
use App\Admin\Actions\Post\Replicate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        $grid->column('offer_status', __('Offer status'))->using(['1' => 'Live', '0' => 'Paused'])->label([
            1 => 'success',
            0 => 'danger',
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

        $currentUser = auth()->user(); // 获取当前登录用户的模型对象
        $admin_id = $currentUser->id; // 输出当前用户名称

        if ($admin_id == 1 || $admin_id == 2) {
            $where = [];
        } else {
            $where[] = ['admin_id', '=', $admin_id];
        }

        $geos_list = Geos::get()->toArray();
        $category_list = Category::get()->toArray();

        //数据分为左右处理
        $filteredDataArray = Offer::where('offer_status', 1)->where($where)->get()->toArray();//奇数

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
        $data = [
            'offer' => $filteredDataArray,
            'geos_list' => $geos_list,
            'category_list' => $category_list,
//            'offer1' => $filteredDataArrayCopy,
        ];

//        print_r("<pre/>");
//        print_r($data);exit;

        return $content->view('offer.show', compact('data'));
    }


    public function query(Request $request)
    {

        $currentUser = auth()->user(); // 获取当前登录用户的模型对象
        $admin_id = $currentUser->id; // 输出当前用户名称

        // 处理表单提交逻辑
        $keyword = $request->input('keyword');
        $category = $request->input('category');
        $geos = $request->input('geos');
        $sort = $request->input('sort');
        $where = [];


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


        $where[] = ['offer_status', '=', 1];
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
            })->where($where)
            ->orderBy($field, $order)->get()->toArray();//奇数



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
            if(!empty($offer['track_list'])){
                foreach ($offer['track_list'] as $x=>$y){
                    $land = isset($offer['track_list'][$x][0]['land_link']) ? $offer['track_list'][$x][0]['land_link'] : '';
                }
            }




            $first = '<div class="col-md-12 accord" data-offer_db="KneeBoost Pro"><ul class="nav nav-tabs" role="tablist"><li class="active"><a href="#tab' . $key . 'Offer" role="tab" data-toggle="tab">Summary</a></li><li><a href="#tab' . $key . 'Description" role="tab" data-toggle="tab">Description</a></li><li><a href="#tab' . $key . 'Geos" role="tab" data-toggle="tab">Accepted Geos</a></li><li><a href="#tab' . $key . 'Top_Geos" class="tab_top_geo" role="tab" data-toggle="tab">Top Geos</a></li><li><a href="#tab' . $key . 'Tracking" role="tab" data-toggle="tab">Tracking Links</a></li><li><a href="#tab' . $key . 'ProductsFeed" role="tab" data-toggle="tab">Products Data Feed</a></li><li><a href="#tab' . $key . 'Creative" role="tab" data-toggle="tab">Creatives</a></li><li><a href="##tab' . $key . 'Pixel_Postback" class="offers-tab-pixels" data-offer-id="'.$offer['id'].'" role="tab" data-toggle="tab">Pixels/Postbacks</a></li></ul><div class="tools"><a href="javascript:;" class="collapse"></a><a href="#grid-config" data-toggle="modal" class="config"></a><a href="javascript:;" class="reload"></a><a href="javascript:;" class="remove"></a></div><div class="tab-content"><div class="tab-pane active" id="tab' . $key . 'Offer"><div class="row column-seperation"><div class="col-md-12"><table class="table table-striped table-flip-scroll cf"><thead class="cf"><tr><th><a href="' . $land . '" target="_blank">' . '<span class="offer-product-img-container" data-original-title="" title=""><img src="' . env('APP_URL') . '/upload/' . $offer['image'] . '"  alt="KneeBoost Pro"></span>Offer Preview<i class="icon ion-eye"></i></a></th><th>Payout</th><th>Status</th></tr></thead><tbody><tr><td width="55%">' . $offer['offer_name'] . '</td><td width="25%">$' . $offer['offer_price'] . ' Per Sale</td><td width="20%">' . $lable_status . '</td></tr></tbody></table></div></div></div><div class="tab-pane" id="tab' . $key . 'Description"><div class="row"><div class="col-md-12"><p></p><p><strong></strong></p><p>"' . $offer['des'] . '"</p><p></p></div></div></div><div class="tab-pane" id="tab' . $key . 'Geos"><div class="row"><div class="col-md-12"><p></p><p>' . $offer['accepted_area'] . '</p></div></div></div><div class="tab-pane top_geos_tab" id="tab' . $key . 'Top_Geos"><div class="row"><div class="col-md-12"><div class="top_geos_graph"><div class="col-xs-12"><div class="row"><div class="col-xs-12 col-md-6 col-lg-4 use_small_padding"><div class="row"><div class="col-xs-12"><select class="list_date select2_list padding_left" data-suffix="geo" style="margin-bottom: 10px;" name="date" id=""><option value="today">Today</option><option value="yester">Yesterday</option><option value="week">Current Week</option><option value="month">Current Month</option><option value="year">Year To Date</option><option value="l_week">Last Week</option><option value="l_month">Last Month</option><option value="calendar">Custom</option></select></div></div></div><div class="col-xs-12 col-md-6 col-lg-4 use_small_padding calendar_padding"><div class="col-xs-4 col-sm-4"><div class="row"><div class="about_color"><p class="about_inputs">Start</p></div></div></div><div class="input-append success col-xs-8 col-sm-8"><div class="row"><input type="text" class="form-control date_start"><span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span></div></div></div><div class="col-xs-12 col-md-6 col-lg-4 use_small_padding calendar_padding"><div class="col-xs-4 col-sm-4"><div class="row"><div class="about_color"><p class="about_inputs">End</p></div></div></div><div class="input-append success col-xs-8 col-sm-8">
                                                                        <div class="row">
                                                                            <input type="text" class="form-control date_end">
                                                                            <span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <table class="table no-more-tables geo_table">
                                                                    <thead>
                                                                    <tr>
                                                                        <th style="width:30%">COUNTRY</th>
                                                                        <th style="width:20%">Percentage</th>
                                                                        <th style="width:50%">Distribution</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody></tbody>
                                                                </table>
                                                                <div style="display:none;" class="geo_date_no_data">
                                                                    <p>Morpheus: Throughout human history, we have been dependent on machines to survive. Fate, it seems, is not without a sense of irony.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wait_loader">
                                                <img src="images/squares-preloader-gif.svg" alt="">
                                            </div>
                                        </div>





 <div class="tab-pane" id="tab' . $key . 'Tracking">
 <div class="row">

 <div class="col-md-12">
 <br>

 <p>' . $offer['track_des'] . '</p>

  <div class="btn-group m-b-30">
  <a class="btn btn-success dropdown-toggle m-b-5" data-toggle="dropdown" href="#">Select your tracking domain<span class="caret"></span></a>
  <ul class="dropdown-menu domains-menu">';



            $track_offersDomain = '';
            foreach ($offer['offersDomain'] as $m=>$n) {
                $track_offersDomain .=  '<li><a href="#" class="offersDomain" data-domain="'.$n['delivery_link'].'">'.$n['delivery_link'].'</a></li>';
            }



            $res=' </ul></div><div class="row"><div class="col-md-12"><!-- filter tabs --><div class="tabbable tabs-left tabs-bg"><ul class="nav nav-tabs" role="tablist">';


            $index = 0;
            //追踪链接的tab
            $track_tab = '';
            foreach ($offer['track_list'] as $key2 => $item2) {
                if ($index == 0) {

                    $track_tab .=  '<li class="active"><a href="#provenorderpages-' . $key2 . $key . '" role="tab" data-toggle="tab">' . $key2 . '</a></li>';

                } else {

                    $track_tab .=   '<li><a href="#provenorderpages-' . $key2 . $key . '" role="tab" data-toggle="tab">' . $key2 . '</a></li>';

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

<div class="padding-for_links"><div>' . $item4['track_name'] . '</div><input  style="width: calc(100% - 100px)" readonly="" type="text" class="form-control trecking_link clipboard-0-0-0 dynamicDomainTrackingLink clipboard-1-0-0-1'.$key2.'-'.$key3.'-'.$key4.'" value="' . $item4['track_link'] . '"><a href="' . $item4['track_link'] . '"  class=" dynamicDomainTrackingLink"><i class="icon ion-eye pull-right"></i></a><a class="copp pull-right btn btn-success btn-cons copy-button" data-clipboard-action="copy" data-clipboard-target=".clipboard-1-0-0-1'.$key2.'-'.$key3.'-'.$key4.'">Copy</a></div></div>';

                }


                $data_div = ' </div>';
                $track .= $track1 . $row . $data1 . $data_div;
            }



            $third = '</div></div><div class="clearfix"></div></div></div></div></div></div><div class="tab-pane" id="tab'.$key.'ProductsFeed"><div class="row"><div class="col-md-12"><p>Want to Sell on More Channels? Tap into the power of product listing optimization and import our entire product list.</p><p>You can find below the entire catalogue automated Products Data Feed, for easy submit to shopping channels and all the major marketplaces.</p></div><div class="col-md-12"><!-- dropdown domains --><div class="btn-group m-b-30"><a class="btn btn-success dropdown-toggle m-b-5" data-toggle="dropdown" href="#">Select your Products Feed domain<span class="caret"></span></a><ul class="dropdown-menu domains-menu domains-menu-feed"><li><a href="#" class="offersDomain" data-domain="https://urgoodeal.com">https://urgoodeal.com</a></li><li><a href="#" class="offersDomain" data-domain="https://xtechgadget.com">https://xtechgadget.com</a></li><li><a href="#" class="offersDomain" data-domain="https://popularhitech.com">https://popularhitech.com</a></li><li><a href="#" class="offersDomain" data-domain="https://buysmartproduct.com">https://buysmartproduct.com</a></li><li><a href="#" class="offersDomain" data-domain="https://storepx.com">https://storepx.com</a></li><li><a href="#" class="offersDomain" data-domain="https://airportxshop.com">https://airportxshop.com</a></li><li><a href="#" class="offersDomain" data-domain="https://flightxshop.com">https://flightxshop.com</a></li><li><a href="#" class="offersDomain" data-domain="https://blackfridaytechs.com">https://blackfridaytechs.com</a></li><li><a href="#" class="offersDomain" data-domain="https://techchristmasgift.com">https://techchristmasgift.com</a></li><li><a href="#" class="offersDomain" data-domain="https://gadgetronixs.com">https://gadgetronixs.com</a></li><li><a href="#" class="offersDomain" data-domain="https://luxurygadgetx.com">https://luxurygadgetx.com</a></li><li><a href="#" class="offersDomain" data-domain="https://newxventions.com">https://newxventions.com</a></li><li><a href="#" class="offersDomain" data-domain="https://appgogadget.com">https://appgogadget.com</a></li><li><a href="#" class="offersDomain" data-domain="https://todaystech.co">https://todaystech.co</a></li></ul></div><!-- end dropdown domains --></div><div class="col-md-12"><div>Products Feed - All Products</div><input readonly="" type="text" class="form-control trecking_link clipboard-ProductsFeed-0 dynamicDomainTrackingLink" value="https://popularhitech.com/feed?net=6546&amp;aff={AFFID}&amp;sid={SUBID}&amp;cid={CLICKID}"><a href="https://popularhitech.com/feed?net=6546&amp;aff={AFFID}&amp;sid={SUBID}&amp;cid={CLICKID}" target="_blank" class="dynamicDomainTrackingLink"><i class="icon ion-eye pull-right"></i></a><button class="copp pull-right btn btn-success btn-cons" data-clipboard-action="copy" data-clipboard-target=".clipboard-ProductsFeed-0">Copy</button></div></div></div><div class="tab-pane" id="tab' . $key . 'Creative"><div class="row"><div class="col-md-12">';

            $forth = '';
            foreach ($offer['creatives'] as $k1 => $i1) {
                $forth = '<p></p><p>' . $i1['name'] . '</p><p><a href="' . $i1['link'] . '" target="_blank">' . $i1['link'] . '</a></p>';
                $forth .= $forth;
            }



            $sixth = '</div></div></div><div class="tab-pane" id="tab'.$key.'Pixel_Postback"><div class="wait_loader offers-tab-pixels-loader" data-offer-id="'.$offer['id'].'"><img src="images/squares-preloader-gif.svg" alt="preloader"></div><div class="offers-tab-pixels-container" data-offer-id="'.$offer['id'].'"></div></div></div></div>';
            $result .= $first .$track_offersDomain .$res.$track_tab . $tab_content . $track . $third . $forth . $sixth;


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

        $form->text('offer_name', __('Offer name'))->required();
        $form->image('image', __('Offer Image'));
        $form->currency('offer_price', __('Payout'))->required();
        $form->switch('offer_status', __('Offer status'))->default(1);
        $form->textarea('des', __('Offer Des'));
        $form->multipleSelect('accepted_area', __('Accepted Area'))->options(Geos::all()->pluck('country', 'id'))->required();
        $form->multipleSelect('cate_id', __('Offer Category'))->options(Category::all()->pluck('category_name', 'id'));

        $form->textarea('track_des', __('Track Des'));
        $form->multipleSelect('track_cate_id', __('Track Cate'))->options(OfferTracksCates::all()->pluck('track_cate', 'id'))->required();

        $form->multipleSelect('creatives_id', __('Creatives'))->options(Creatives::all()->pluck('name', 'id'))->required();


//        $form->multipleSelect('admin', __('Track Cate'))->options(OfferTracksCates::all()->pluck('track_cate', 'id'))->required();

//        $form->saving(function (Form $form) {
//
//
//
//            OfferTracks::where('id',$form->track_cate_id)
//
//
//
//            print_r($form->track_cate_id);exit;
//        });


        return $form;
    }


}
