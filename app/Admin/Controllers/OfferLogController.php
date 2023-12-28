<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\OfferLog;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class OfferLogController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new OfferLog(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('offer_id');
            $grid->column('date');
            $grid->column('time');
            $grid->column('ip');
            $grid->column('net');
            $grid->column('affid');
            $grid->column('cid');
            $grid->column('sid');
            $grid->column('revenue');
            $grid->column('create_at');
            $grid->column('update_at');
        
            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
        
            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new OfferLog(), function (Show $show) {
            $show->field('id');
            $show->field('offer_id');
            $show->field('date');
            $show->field('time');
            $show->field('ip');
            $show->field('net');
            $show->field('affid');
            $show->field('cid');
            $show->field('sid');
            $show->field('revenue');
            $show->field('create_at');
            $show->field('update_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new OfferLog(), function (Form $form) {
            $form->display('id');
            $form->text('offer_id');
            $form->text('date');
            $form->text('time');
            $form->text('ip');
            $form->text('net');
            $form->text('affid');
            $form->text('cid');
            $form->text('sid');
            $form->text('revenue');
            $form->text('create_at');
            $form->text('update_at');
        });
    }
}
