<?php

namespace App\Admin\Controllers;

use App\Models\Offer;
use App\Models\OfferLog;
use App\Models\OfferTracksCates;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class OfferAdvancedController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Advanced';
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new OfferLog());

        $grid->column('id', __('Id'))->filter();
        $grid->column('created_at', __('Create at'));
        $grid->column('offer.offer_name', __('OFFER'));
        $grid->column('country.country', __('COUNTRY'));
        $grid->column('ip', __('IP'))->ip();
        $grid->column('token', __('Token'));
        $grid->column('token_time', __('Token Time'));
        // $grid->column('net', __('NET'));
        // $grid->column('affid', __('AFFID'))->filter();
        // $grid->column('cid', __('CID'));
        // $grid->column('sid', __('SID'));
        $grid->column('revenue', __('REVENUE'))->currency();
        $grid->column('status', __('Type'))->using(['1' => '其他订单', '2' => '系统订单']);

        $grid->column('clickid', __('Clickid'));
        $grid->column('clickid_time', __('Clickid Time'));


        $grid->paginate(20);
        $grid->disableCreation();
//        $grid->disableExport();

        $grid->filter(function (Grid\Filter $filter) {
            $filter->column(1/2, function ($filter) {
                $filter->like('offerData.offer_name','Offer');
            });
            $filter->column(1/2, function ($filter) {
                $filter->like('geos.country','Country');
            });
            $filter->between('created_at', 'created_at')->datetime();
            $filter->column(1/2, function ($filter) {
                $filter->like('token','Token');
            });
            $filter->expand();
        });

        $grid->footer(function ($query) {
            // 查询出已支付状态的订单总金额
            $data = $query->join('offers','offer_id','=','offers.id')->sum('offers.offer_price');
            // 查询出已支付状态的订单总数
            $data1 = $query->count();
            echo "<div style='padding: 10px;'><strong>TOTAL RECORD:</strong> $data1 | <strong>TOTAL REVENUE:</strong> $data</div>";
        });



        // 在 totalRow 中统计关联表的字段值
        // 使用 withSum 方法加载关联表 comments 的 amount 字段的总和
//        $grid->footer(function ($query) {
//
//
//            // 查询出已支付状态的订单总金额
//            $data = $query->withsum('offer.offer_price');
//
//            print_r($data);exit;
//            return "<div style='padding: 10px;'>总收入 ： $data</div>";
//        });



//        $grid->column('奖金')->display(function () {
//            $offer_price = Offer::where('id',$this->offer_id)->value('offer_price');
//            $commission_amount = $this->column('total_amount') * ($commission/100);
//            return $commission_amount;
//        });



//        $grid->comments('Comments', function ($comments) {
//            $comments->id('Comment ID');
//            $comments->content('Comment Content');
//            // 其他评论表格列定义...
//        });

        // 设置总计行的统计信息
//        $grid->footer(function ($query) {
//            // 这里使用 withCount 方法获取关联表的统计信息
//            $query->with('offer');
//
//            // 这里可以使用 $query 获取数据进行统计计算
//            $total = $query->sum('offer_id');
//
//            // 获取关联表的统计值
//            $totalComments = $query->pluck('offer.offer_price')->flatten()->count();
//
//            // 在表格底部显示统计信息，包括关联表的值
//            echo "<div style='padding: 10px;'><strong>Total:</strong>  | <strong>Total Comments:</strong> $totalComments</div>";
//        });


//        $grid->totalRow(true);
//        $grid->offer('country', '金额')->totalRow(function ($id) {

//            return "<span class='text-danger text-bold'><i class='fa fa-yen'></i> {$id} 元</span>";
//
//});



//        $grid->disableActions();
//        $grid->disableCreation();
//        $grid->disablePagination();//禁用分页
//        $grid->model()->orderBy('id','desc')->limit(20);
//        $grid->disableExport();
//        $grid->disableColumnSelector();
//        $grid->disableFilter();

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
        $show = new Show(OfferLog::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('track_name', __('Track Name'));
        $show->field('track_link', __('Track Link'));
        $show->field('track_type_id', __('Type'));
        $show->field('created_at', __('Create at'));
        $show->field('updated_at', __('Update at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new OfferLog());

        $form->text('track_name', __('Track name'))->required();
        $form->url('track_link', __('Track Link'))->required();
        $form->select('track_type_id', __('Type'))->options(OfferTracksCates::all()->pluck('track_cate', 'id'))->required();
        $form->datetime('created_at', __('Create at'))->default(date('Y-m-d H:i:s'));

        return $form;
    }


}
