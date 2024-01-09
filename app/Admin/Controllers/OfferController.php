<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Creatives;
use App\Models\Geos;
use App\Models\Offer;
use App\Models\OfferTracks;
use App\Models\OfferTracksCate;
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

        // 在主模型表格中展示一对多关系的子模型
//        $grid->comments('Comments')->display(function ($comments) {
//
//            print_r($comments);exit;
//
//
//            $comments = Category::whereIn('id', $comments)->pluck('category_name')->map(function ($comments) {
//                return "<span class='label label-success'>{$comments}</span>";
//            });
//
//            return $comments->implode('&nbsp;');
//        });
        $grid->column('cate_id', 'Categories')->display(function () {
            $categoryIds = explode(',', $this->cate_id);
            $categories = Category::whereIn('id', $categoryIds)->pluck('category_name')->toArray();

            return implode(', ', $categories);
        })->label();

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


    public function store()
    {

        $cate_id = implode(',', $_REQUEST['cate_id']);
        $accepted_area = implode(',', $_REQUEST['accepted_area']);
        $creatives_id = implode(',', $_REQUEST['creatives_id']);
        $offer_name = !empty($_REQUEST['offer_name']) ? $_REQUEST['offer_name'] :'';
        $des = !empty($_REQUEST['des']) ? $_REQUEST['des']:'';
        $track_des = !empty($_REQUEST['track_des']) ? $_REQUEST['track_des']:'';
        $offer_price = !empty($_REQUEST['offer_price']) ? $_REQUEST['offer_price'] :'';
        if ($_REQUEST['offer_status']) {
            $offer_status = 1;
        } else {
            $offer_status = 2;
        }

//        // 通过Eloquent模型创建新的文章记录
        $Offer = Offer::create([
            'cate_id' => trim($cate_id, ','),
            'offer_name' => $offer_name,
            'des' => $des,
            'creatives_id' => trim($creatives_id, ','),
            'track_des' => $track_des,
            'accepted_area' => trim($accepted_area, ','),
            'offer_price' => $offer_price,
            'offer_status' => $offer_status,
        ]);

//        // 打印添加的数据
        Log::info('New Offer added:', $Offer->toArray());

        return redirect('/admin/offer');
    }


    public function show($id, Content $content)
    {


        $geos_list = Geos::get()->toArray();
        $category_list = Category::get()->toArray();


        $filteredDataArray = Offer::where('offer_status', 1)->whereRaw('MOD(id, 2) = 1')->get()->toArray();//奇数
        $filteredDataArrayCopy = Offer::where('offer_status', 1)->whereRaw('MOD(id, 2) = 0')->get()->toArray();//偶数


        foreach ($filteredDataArray as $key => $value) {

            $track_cate = OfferTracksCate::whereIn('id', explode(',', $value['track_cate_id']))->select('id', 'track_cate')->get()->toArray();


//            $fieldToSwap = 'track_cate';
//            //// 使用 array_map 函数进行互换
//            $swappedArray = array_map(function ($key, $item) use ($fieldToSwap) {
//                return [$item[$fieldToSwap] => array_merge(['key' => $key], $item)];
//            }, array_keys($track_cate), $track_cate);
//            // 将结果数组进行合并
//            $finalArray = array_merge(...$swappedArray);

//            print_r("<pre/>");
//            print_r($track_cate);exit;


            foreach ($track_cate as $k => $v) {
                $finalArray[$k] = OfferTracks::where('track_type_id', $v['id'])->get()->toArray();// $finalArray[$v['track_cate'].'_'.$k]
            }

            $filteredDataArray[$key]['track_list'] = $finalArray;
            $filteredDataArray[$key]['creatives'] = Creatives::where('offer_id', $value['id'])->get()->toArray();
        }


        foreach ($filteredDataArrayCopy as $key => $value) {

            $track_cate = OfferTracksCate::whereIn('id', explode(',', $value['track_cate_id']))->select('id', 'track_cate')->get()->toArray();


//            $fieldToSwap = 'track_cate';
//            //// 使用 array_map 函数进行互换
//            $swappedArray = array_map(function ($key, $item) use ($fieldToSwap) {
//                return [$item[$fieldToSwap] => array_merge(['key' => $key], $item)];
//            }, array_keys($track_cate), $track_cate);
//            // 将结果数组进行合并
//            $finalArray = array_merge(...$swappedArray);


            foreach ($track_cate as $k => $v) {
                $finalArrayCopy[$k] = OfferTracks::where('track_type_id', $v['id'])->get()->toArray();//$v['track_cate'].'_'.$k
            }

            $filteredDataArrayCopy[$key]['track_list'] = $finalArrayCopy;
            $filteredDataArrayCopy[$key]['creatives'] = Creatives::where('offer_id', $value['id'])->get()->toArray();
        }


        $filteredDataArray = array_values($filteredDataArray);
        $filteredDataArrayCopy = array_values($filteredDataArrayCopy);


//        $offer1 = Offer::where('offer_status', 1)->whereIn('id',[1,2])->orderBy('id', 'desc')->get()->toArray();
//
//
//        foreach ($offer1 as $key1 => $value1) {
//            $offer1[$key1]['track_list'][0] = OfferTracks::whereIn('id', [11,12,13])->get()->toArray();
//            $offer1[$key1]['track_list'][1] = OfferTracks::whereIn('id', [3,4,5])->get()->toArray();
//
//
//            $offer1[$key1]['creatives'] = Creatives::where('offer_id', $value1['id'])->get()->toArray();
//        }

//        print_r("<pre/>");
//print_r($offer1);exit;


//
//        $data = [
//            'offer' => $offer1,
//            'geos_list' => $geos_list,
//            'category_list' => $category_list,
//
//            'offer1' => $offer1,
////            'geos_list1' => $geos_list1,
////            'category_list1' => $category_list1,
//
//        ];

//        print_r("<pre/>");
//        print_r($data);exit;
////
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


    public function query(Request $request)
    {
        // 处理表单提交逻辑
        $keyword = $request->input('keyword');
        $category = $request->input('category');
        $geos = $request->input('geos');
        $sort = $request->input('sort');
        $where = [];
        if (!empty($keyword)) {
            $where[] = ['offer_name', 'like', "%$keyword%"];
        }

        if (!empty($category)) {
            $category = implode(',', $category);
            $where[] = ['offer_cate', 'like', "%$category%"];
        }

        if (!empty($geos)) {
            $geos = implode(',', $geos);
            $where[] = ['accepted_area', 'like', "%$geos%"];
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

        /*
                $offer = Offer::where($where)->orderBy($field, $order)->where('offer_status', 1)->whereIn('id',[1,2])->get()->toArray();
                foreach ($offer as $key => $value) {
                    $offer[$key]['track_list'] = OfferTracks::where('track_type_id', $value['id'])->get()->toArray();
                    $offer[$key]['creatives'] = Creatives::where('offer_id', $value['id'])->get()->toArray();
                }

                */


//        $filteredDataArray = Offer::where('offer_status', 1)->whereRaw('MOD(id, 2) = 1')->get()->toArray();//奇数


//        $filteredDataArray = Offer::where('offer_status', 1)->whereRaw('MOD(id, 2) = 1')->get()->toArray();//奇数
//        $filteredDataArrayCopy = Offer::where('offer_status', 1)->whereRaw('MOD(id, 2) = 0')->get()->toArray();//偶数


        $filteredDataArray = Offer::where('offer_status', 1)->where($where)->orderBy($field, $order)->whereRaw('MOD(id, 2) = 1')->get()->toArray();//奇数
        $filteredDataArrayCopy = Offer::where('offer_status', 1)->where($where)->orderBy($field, $order)->whereRaw('MOD(id, 2) = 0')->get()->toArray();//偶数


//        print_r($filteredDataArrayCopy);exit;


        foreach ($filteredDataArray as $key => $value) {

            $track_cate = OfferTracksCate::whereIn('id', explode(',', $value['track_cate_id']))->select('id', 'track_cate')->get()->toArray();
            foreach ($track_cate as $k => $v) {
                $finalArray[$k] = OfferTracks::where('track_type_id', $v['id'])->get()->toArray();// $finalArray[$v['track_cate'].'_'.$k]
            }

            $filteredDataArray[$key]['track_list'] = $finalArray;
            $filteredDataArray[$key]['creatives'] = Creatives::where('offer_id', $value['id'])->get()->toArray();
        }

        foreach ($filteredDataArrayCopy as $key => $value) {

            $track_cate = OfferTracksCate::whereIn('id', explode(',', $value['track_cate_id']))->select('id', 'track_cate')->get()->toArray();
            foreach ($track_cate as $k => $v) {
                $finalArray[$k] = OfferTracks::where('track_type_id', $v['id'])->get()->toArray();// $finalArray[$v['track_cate'].'_'.$k]
            }

            $filteredDataArrayCopy[$key]['track_list'] = $finalArray;
            $filteredDataArrayCopy[$key]['creatives'] = Creatives::where('offer_id', $value['id'])->get()->toArray();
        }


        $filteredDataArray = $this->htmlSpliceCopy($filteredDataArray);
        $filteredDataArrayCopy = $this->htmlSpliceCopy1($filteredDataArrayCopy);


        $result = [
            'left_data' => $filteredDataArray,
            'right_data' => $filteredDataArrayCopy,
        ];

        return response()->json($result);
    }


    protected function htmlSpliceCopy($offer)
    {

        $result = '';
        foreach ($offer as $key => $item) {

            $first = '<div class="col-md-12 accord" data-offer_db="CozyTime Pro" data-marker-id="' . $item['id'] . '"><ul class="nav nav-tabs" role="tablist"><li class="active"><a href="#tab0Offer_' . $key . '" role="tab" data-toggle="tab">Summary</a></li><li><a href="#tab0Description_' . $key . '" role="tab" data-toggle="tab">Description</a></li><li><a href="#tab0Geos_' . $key . '" role="tab" data-toggle="tab">Accepted Geos</a></li><li><a href="#tab0Tracking_' . $key . '" role="tab" data-toggle="tab">Tracking Links</a></li><li><a href="#tab0Creative_' . $key . '" role="tab" data-toggle="tab">Creatives</a></li></ul><div class="tools"><a href="javascript:;" class="collapse"></a><a href="?id=offer#grid-config" data-toggle="modal" class="config"></a><a href="javascript:;" class="reload"></a><a href="javascript:;" class="remove"></a></div><div class="tab-content"><div class="tab-pane active" id="tab0Offer_' . $key . '"><div class="row column-seperation"><div class="col-md-12"><table class="table table-striped table-flip-scroll cf"><thead class="cf"><tr><th><a href="123" target="_blank">' . '<span class="offer-product-img-container" data-original-title="" title=""><img src="' . $item['image'] . '" alt="CozyTime Pro"></span>Offer Preview<i class="icon ion-eye"></i></a></th><th>Payout</th><th>Status</th></tr></thead><tbody><tr><td width="55%">' . $item['offer_name'] . '</td><td width="25%">$' . $item['offer_price'] . ' Per Sale</td><td width="20%"><span class="label label-success">Live</span></td></tr></tbody></table></div></div></div><div class="tab-pane" id="tab0Description_' . $key . '"><div class="row"><div class="col-md-12"><p></p><p><strong>E-commerce - CozyTime Pro INTL - All Languages - EXCLUSIVE</strong></p><p>"' . $item['des'] . '"</p><p></p></div></div></div><div class="tab-pane" id="tab0Geos_' . $key . '"><div class="row"><div class="col-md-12"><p></p><p>' . $item['accepted_area'] . '</p></div></div></div><div class="tab-pane" id="tab0Tracking_' . $key . '"><div class="row"><div class="col-md-12"><p>' . $item['track_des'] . '</p></div><div class="col-md-12"><div class="row"><div class="col-md-12"><div class="tabbable tabs-left tabs-bg"><ul class="nav nav-tabs" role="tablist">';


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
                    $data1 .= '<div class="col-md-12"><div class="padding-for_links"><div>' . $item4['track_name'] . '</div><input readonly="" type="text" class="form-control trecking_link clipboard-1-0-0 dynamicDomainTrackingLink" value="' . $item4['track_link'] . '"><a href="' . $item4['track_link'] . '"><i class="icon ion-eye pull-right"></i></a><button class="copp pull-right btn btn-success btn-cons" data-clipboard-action="copy" data-clipboard-target=".clipboard-1-0-0">Copy</button></div></div>';

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

        $result = '';
        foreach ($offer as $key => $item) {

            $first = '<div class="col-md-12 accord" data-offer_db="CozyTime Pro" data-marker-id="' . $item['id'] . '"><ul class="nav nav-tabs" role="tablist"><li class="active"><a href="#tab0Offer_8' . $key . '" role="tab" data-toggle="tab">Summary</a></li><li><a href="#tab0Description_8' . $key . '" role="tab" data-toggle="tab">Description</a></li><li><a href="#tab0Geos_8' . $key . '" role="tab" data-toggle="tab">Accepted Geos</a></li><li><a href="#tab0Tracking_8' . $key . '" role="tab" data-toggle="tab">Tracking Links</a></li><li><a href="#tab0Creative_8' . $key . '" role="tab" data-toggle="tab">Creatives</a></li></ul><div class="tools"><a href="javascript:;" class="collapse"></a><a href="?id=offer#grid-config" data-toggle="modal" class="config"></a><a href="javascript:;" class="reload"></a><a href="javascript:;" class="remove"></a></div><div class="tab-content"><div class="tab-pane active" id="tab0Offer_8' . $key . '"><div class="row column-seperation"><div class="col-md-12"><table class="table table-striped table-flip-scroll cf"><thead class="cf"><tr><th><a href="123" target="_blank">' . '<span class="offer-product-img-container" data-original-title="" title=""><img src="' . $item['image'] . '" alt="CozyTime Pro"></span>Offer Preview<i class="icon ion-eye"></i></a></th><th>Payout</th><th>Status</th></tr></thead><tbody><tr><td width="55%">' . $item['offer_name'] . '</td><td width="25%">$' . $item['offer_price'] . ' Per Sale</td><td width="20%"><span class="label label-success">Live</span></td></tr></tbody></table></div></div></div><div class="tab-pane" id="tab0Description_8' . $key . '"><div class="row"><div class="col-md-12"><p></p><p><strong>E-commerce - CozyTime Pro INTL - All Languages - EXCLUSIVE</strong></p><p>"' . $item['des'] . '"</p><p></p></div></div></div><div class="tab-pane" id="tab0Geos_8' . $key . '"><div class="row"><div class="col-md-12"><p></p><p>' . $item['accepted_area'] . '</p></div></div></div><div class="tab-pane" id="tab0Tracking_8' . $key . '"><div class="row"><div class="col-md-12"><p>' . $item['track_des'] . '</p></div><div class="col-md-12"><div class="row"><div class="col-md-12"><div class="tabbable tabs-left tabs-bg"><ul class="nav nav-tabs" role="tablist">';


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
                    $data1 .= '<div class="col-md-12"><div class="padding-for_links"><div>' . $item4['track_name'] . '</div><input readonly="" type="text" class="form-control trecking_link clipboard-1-0-0 dynamicDomainTrackingLink" value="' . $item4['track_link'] . '"><a href="' . $item4['track_link'] . '"><i class="icon ion-eye pull-right"></i></a><button class="copp pull-right btn btn-success btn-cons" data-clipboard-action="copy" data-clipboard-target=".clipboard-1-0-0">Copy</button></div></div>';

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
        $data = Category::get()->toArray();

        foreach ($data as $item) {
            $_item = $item["id"];
            $_item1 = $item["category_name"];
            $arr[$_item] = $_item1;
        }

        $form->multipleSelect('cate_id', __('Offer Category'))->options($arr)->required();
        $form->multipleSelect('accepted_area', __('Accepted Area'))->options(Geos::all()->pluck('country', 'id'))->required();
        $form->multipleSelect('creatives_id', __('Creatives'))->options(Creatives::all()->pluck('name', 'id'))->required();

        $form->text('offer_name', __('Offer name'))->required();
        $form->textarea('des', __('Offer Des'));
        $form->textarea('track_des', __('Track Des'));

        $form->image('image', __('Offer Image'))->downloadable()->required();
        $form->currency('offer_price', __('Payout'))->required();
        $form->switch('offer_status', __('Offer status'))->default(1);

        return $form;
    }


}
