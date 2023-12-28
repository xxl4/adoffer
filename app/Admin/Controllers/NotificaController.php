<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Notifica;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class NotificaController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Notifica(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('notifica_title');
            $grid->column('notifica_content')->textarea();
            $grid->column('notifica_user');
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
        return Show::make($id, new Notifica(), function (Show $show) {
            $show->field('id');
            $show->field('notifica_title');
            $show->field('notifica_content');
            $show->field('notifica_user');
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
        return Form::make(new Notifica(), function (Form $form) {
            $form->display('id');
            $form->text('notifica_title');
            $form->text('notifica_content');
            $form->text('notifica_user');
            $form->text('create_at');
            $form->text('update_at');
        });
    }
}
