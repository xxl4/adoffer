<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Creatives;
use App\Models\Delivery;
use App\Models\Geos;
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

        $currentUser = auth()->user(); // 获取当前登录用户的模型对象
        $admin_id = $currentUser->id; // 输出当前用户名称

        if ($admin_id == 1 || $admin_id == 2) {
            $where = [];
        } else {
            $where[] = ['admin_id', '=', $admin_id];
        }

        $geos_list = Geos::get()->toArray();
        $category_list = Category::get()->toArray();

        $filteredDataArray = Offer::where('offer_status', 1)->where($where)->whereRaw('MOD(id, 2) = 1')->get()->toArray();//奇数
        $filteredDataArrayCopy = Offer::where('offer_status', 1)->where($where)->whereRaw('MOD(id, 2) = 0')->get()->toArray();//偶数

//        print_r("<pre/>");
//        print_r($filteredDataArrayCopy);exit;

        foreach ($filteredDataArray as $key => $value) {

            $accepted_area = Geos::whereIn('id', $value['accepted_area'])->select('country')->get()->toArray();

            $accepted_area_data = '';
            foreach ($accepted_area as $k => $v) {
                $accepted_area_data .= $v['country'] . ',';
            }
//            print_r($accepted_area_data);exit;

            $filteredDataArray[$key]['accepted_area'] = trim($accepted_area_data, ',');
            $track_cate = OfferTracksCates::whereIn('id', $value['track_cate_id'])->select('id', 'track_cate')->get()->toArray();

            $delivery_info = Delivery::where('status',1)->get()->toArray();


            $delivery_link = !empty($delivery_info[0]['delivery_link']) ? $delivery_info[0]['delivery_link'] : '';

//            print_r("<pre/>");
//            print_r($track_cate);exit;

//            print_r("<pre/>");
//            print_r($track_cate);exit;

            $fieldToSwap = 'track_cate';
            //// 使用 array_map 函数进行互换
            $swappedArray = array_map(function ($key1, $item) use ($fieldToSwap) {
                return [$item[$fieldToSwap] => array_merge(['key' => $key1], $item)];
            }, array_keys($track_cate), $track_cate);
            // 将结果数组进行合并
            $finalArray = array_merge(...$swappedArray);
//
//            print_r("<pre/>");
//            print_r($finalArray);exit;



            foreach ($track_cate as $k => $v) {
                $track_list = OfferTracks::where('track_type_id', $v['id'])->get()->toArray();  // $finalArray[$k]

                foreach ($track_list as $x => $y) {
                    $param = 'api/offers/jump?admin_id=' . $admin_id . '&cateid='.$v['id'].'&offer_id='.$value['id'].'&track_id='.$y['id'];
                  /*  $track_list[$x]['track_link'] = $y['track_link'] . $param;*/

                    $track_list[$x]['track_link'] = $delivery_link . $param;

                }



//                $finalArray[$k] = $track_list;
                $finalArray[$v['track_cate']] = $track_list;

            }



            $filteredDataArray[$key]['track_list'] = $finalArray;
            $filteredDataArray[$key]['creatives'] = Creatives::whereIn('id', $value['creatives_id'])->get()->toArray();
        }

//        print_r("<pre/>");
//        print_r($filteredDataArray);exit;



        foreach ($filteredDataArrayCopy as $key => $value) {


            $track_cate = OfferTracksCates::whereIn('id', $value['track_cate_id'])->select('id', 'track_cate')->get()->toArray();


//            $filteredDataArrayCopy[$key]['accepted_area'] = Geos::whereIn('id',$value['accepted_area'])->get()->toArray();

            $accepted_area = Geos::whereIn('id', $value['accepted_area'])->get()->toArray();

            $accepted_area_data = '';
            foreach ($accepted_area as $k => $v) {
                $accepted_area_data .= $v['country'] . ',';
            }

            $filteredDataArrayCopy[$key]['accepted_area'] = trim($accepted_area_data, ',');

            $fieldToSwap = 'track_cate';
            //// 使用 array_map 函数进行互换
            $swappedArray = array_map(function ($key1, $item) use ($fieldToSwap) {
                return [$item[$fieldToSwap] => array_merge(['key' => $key1], $item)];
            }, array_keys($track_cate), $track_cate);
            // 将结果数组进行合并
            $finalArrayCopy = array_merge(...$swappedArray);

//            print_r("<pre/>");
//            print_r($track_cate);exit;


            foreach ($track_cate as $k => $v) {
                $track_list_copy = OfferTracks::where('track_type_id', $v['id'])->get()->toArray();//$v['track_cate'].'_'.$k

                foreach ($track_list_copy as $x => $y) {
                    $param = 'api/offers/jump?admin_id=' . $admin_id . '&cateid='.$v['id'].'&offer_id='.$value['id'].'&track_id='.$y['id'];
//                    $track_list_copy[$x]['track_link'] = $y['track_link'] . $param;

                    $track_list_copy[$x]['track_link'] = $delivery_link . $param;

                }
//                $finalArrayCopy[$k] = $track_list_copy;

                $finalArrayCopy[$v['track_cate']]= $track_list_copy;
            }

            $filteredDataArrayCopy[$key]['track_list'] = $finalArrayCopy;
            $filteredDataArrayCopy[$key]['creatives'] = Creatives::whereIn('id', $value['creatives_id'])->get()->toArray();
        }
//        print_r("<pre/>");
//        print_r($filteredDataArrayCopy);exit;

        $filteredDataArray = array_values($filteredDataArray);
        $filteredDataArrayCopy = array_values($filteredDataArrayCopy);





        $data = [
            'offer' => $filteredDataArray,
            'geos_list' => $geos_list,
            'category_list' => $category_list,
            'offer1' => $filteredDataArrayCopy,
        ];

//        print_r("<pre/>");
//        print_r($data);exit;


        return $content->title('详情')
            ->description('简介')
            ->view('offer.show', compact('data'));
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

//        $filteredDataArray = Offer::where('offer_status', 1)->whereRaw('MOD(id, 2) = 1')->get()->toArray();//奇数
//        $filteredDataArrayCopy = Offer::where('offer_status', 1)->whereRaw('MOD(id, 2) = 0')->get()->toArray();//偶数


        $filteredDataArray = Offer::where(function ($query) use ($geos) {
            $values = explode(',', $geos);
            foreach ($values as $value) {
                $query->orWhere('accepted_area', 'like', "%$value%");
            }
        })
            ->where(function ($query) use ($category) {
                $values2 = explode(',', $category);
                foreach ($values2 as $value2) {
                    $query->orWhere('cate_id', 'like', "%$value2%");
                }
            })->whereRaw('MOD(id, 2) = 1')->where($where)
            ->orderBy($field, $order)->get()->toArray();//奇数





        $filteredDataArrayCopy = Offer::where(function ($query) use ($geos) {
            $values = explode(',', $geos);
            foreach ($values as $value) {
                $query->orWhere('accepted_area', 'like', "%$value%");
            }
        })
            ->where(function ($query) use ($category) {
                $values2 = explode(',', $category);
                foreach ($values2 as $value2) {
                    $query->orWhere('cate_id', 'like', "%$value2%");
                }
            })->whereRaw('MOD(id, 2) = 0')->where($where)
            ->orderBy($field, $order)->get()->toArray();//奇数



//        print_r("<pre/>");
//        print_r($filteredDataArrayCopy);exit;


        if (!empty($filteredDataArray)) {
            foreach ($filteredDataArray as $key => $value) {


                $accepted_area = Geos::whereIn('id', $value['accepted_area'])->select('country')->get()->toArray();
                $accepted_area_data = '';
                foreach ($accepted_area as $k => $v) {
                    $accepted_area_data .= $v['country'] . ',';
                }
                $filteredDataArray[$key]['accepted_area'] = trim($accepted_area_data, ',');

                $track_cate = OfferTracksCates::whereIn('id', $value['track_cate_id'])->select('id', 'track_cate')->get()->toArray();
                foreach ($track_cate as $k => $v) {
                    $finalArray[$k] = OfferTracks::where('track_type_id', $v['id'])->get()->toArray();// $finalArray[$v['track_cate'].'_'.$k]
                }

                $filteredDataArray[$key]['track_list'] = $finalArray;
                $filteredDataArray[$key]['creatives'] = Creatives::whereIn('id', $value['creatives_id'])->get()->toArray();
            }
            $filteredDataArray = $this->htmlSpliceCopy($filteredDataArray);
        } else {
            $filteredDataArray = '';
        }


        if (!empty($filteredDataArrayCopy)) {

            foreach ($filteredDataArrayCopy as $key => $value) {
                $accepted_area = Geos::whereIn('id', $value['accepted_area'])->select('country')->get()->toArray();
                $accepted_area_data = '';
                foreach ($accepted_area as $k => $v) {
                    $accepted_area_data .= $v['country'] . ',';
                }
                $filteredDataArrayCopy[$key]['accepted_area'] = trim($accepted_area_data, ',');

                $track_cate = OfferTracksCates::whereIn('id', $value['track_cate_id'])->select('id', 'track_cate')->get()->toArray();
                foreach ($track_cate as $k => $v) {
                    $finalArray[$k] = OfferTracks::where('track_type_id', $v['id'])->get()->toArray();// $finalArray[$v['track_cate'].'_'.$k]
                }


                $filteredDataArrayCopy[$key]['track_list'] = $finalArray;
                $filteredDataArrayCopy[$key]['creatives'] = Creatives::whereIn('id', $value['creatives_id'])->get()->toArray();


            }

//            print_r($filteredDataArrayCopy);exit;


            $filteredDataArrayCopy = $this->htmlSpliceCopy1($filteredDataArrayCopy);
        } else {
            $filteredDataArrayCopy = '';
        }

        $result = [
            'left_data' => $filteredDataArray,
            'right_data' => $filteredDataArrayCopy,
        ];

        return response()->json($result);
    }


    protected function htmlSpliceCopy($offer)
    {
        $currentUser = auth()->user(); // 获取当前登录用户的模型对象
        $admin_id = $currentUser->id; // 输出当前用户名称

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

                    $param = '?admin_id=' . $admin_id . '&aff={AFFID}&sid={SUBID}&cid={CLICKID}&offer_id='.$item['id'].'&track_id='.$item4['id'];
                    $item4['track_link'] = $item4['track_link'] . $param;




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

        $currentUser = auth()->user(); // 获取当前登录用户的模型对象
        $admin_id = $currentUser->id; // 输出当前用户名称
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

                    $param = '?admin_id=' . $admin_id . '&aff={AFFID}&sid={SUBID}&cid={CLICKID}&offer_id='.$item['id'].'&track_id='.$item4['id'];;
                    $item4['track_link'] = $item4['track_link'] . $param;


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
