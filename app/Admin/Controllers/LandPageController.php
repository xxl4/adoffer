<?php

namespace App\Admin\Controllers;

use App\Models\LandPage;
use App\Models\OfferLog;
use App\Models\OfferTracksCates;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class LandPageController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'land_page';
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new LandPage());

        $grid->column('id', __('Id'));
        $grid->column('land_name', __('Land Name'));
        $grid->column('land_link', __('Land Link'))->url();
        $grid->column('created_at', __('Create at'))->default(date('Y-m-d H:i:s'));;
//        $grid->disableActions();
//        $grid->disableCreation();
        $grid->disablePagination();//禁用分页
        $grid->model()->orderBy('id','desc')->limit(10);
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
        $show = new Show(LandPage::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('land_name', __('Land Name'));
        $show->field('land_link', __('Land Link'));
        $show->field('created_at', __('Create at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new LandPage());
        $form->text('land_name', __('Land name'))->required();
        $form->url('land_link', __('Land Link'))->required();
        $form->datetime('created_at', __('Create at'))->default(date('Y-m-d H:i:s'));
        return $form;
    }
}
