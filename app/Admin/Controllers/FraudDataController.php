<?php

namespace App\Admin\Controllers;

use App\Models\Offer;
use App\Models\OfferLog;
use App\Models\OfferTracksCates;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class FraudDataController extends AdminController
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

        $grid->column('id', __('Id'));
        $grid->column('created_at', __('Create at'));
        $grid->column('offer.offer_name', __('OFFER'));
        $grid->column('country.country', __('COUNTRY'));
        $grid->column('ip', __('IP'))->ip();

        $grid->column('revenue', __('REVENUE'))->currency();



        $grid->column('fraud_type')->editable('select', [0 => '正常订单', 1 => '盗刷', 2 => '重复支付', '3' => 'VPN支付']);


        // 设置text、color、和存储值
//        $states = [
//            'on'  => ['value' => 1, 'text' => '打开', 'color' => 'primary'],
//            'off' => ['value' => 2, 'text' => '关闭', 'color' => 'default'],
//        ];


//        $grid->column('fraud_type')->checkbox([
//            1 => 'Sed ut perspiciatis unde omni',
//            2 => 'voluptatem accusantium doloremque',
//            3 => 'dicta sunt explicabo',
//            4 => 'laudantium, totam rem aperiam',
//        ]);

//        $grid->column('status')->switch($states);

//        $grid->column('fraud_type', __('Fraud Type'))->using(['0'=>'正常订单','1' => '盗刷', '2' => '重复支付','3'=>'VPN支付'])->filter();





        $grid->model()->orderBy('created_at', 'desc');

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
            // 查询出已支付状态的订单总数
            $data1 = $query->count();
            echo "<div style='padding: 10px;'><strong>TOTAL RECORD:</strong> $data1 </div>";
        });

        $grid->actions(function ($actions) {
            //关闭行操作 删除
            $actions->disableDelete();
            $actions->disableEdit();
        });

//        $grid->disableActions();
//        $grid->disableEdit();
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
