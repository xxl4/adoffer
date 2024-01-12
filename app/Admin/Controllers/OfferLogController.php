<?php

namespace App\Admin\Controllers;

use App\Models\OfferLog;
use App\Models\OfferTracksCates;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class OfferLogController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'offer_log';
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new OfferLog());

//        $grid->column('id', __('Id'));
        $grid->column('created_at', __('Create at'));
        $grid->column('offer.offer_name', __('OFFER'));
        $grid->column('country.country', __('COUNTRY'));
        $grid->column('ip', __('IP'))->ip();
        $grid->column('net', __('NET'));
        $grid->column('affid', __('AFFID'));
        $grid->column('cid', __('CID'));
        $grid->column('sid', __('SID'));
        $grid->column('offer.offer_price', __('REVENUE'))->currency();
        $grid->disableActions();
        $grid->disableCreation();
        $grid->disablePagination();//禁用分页
        $grid->model()->orderBy('id','desc')->limit(20);
        $grid->disableExport();
        $grid->disableColumnSelector();
        $grid->disableFilter();

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
