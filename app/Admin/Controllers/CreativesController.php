<?php

namespace App\Admin\Controllers;

use App\Models\Creatives;
use App\Models\Offer;
use App\Models\OfferTracks;
use App\Models\Product;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Illuminate\Support\Facades\DB;

class CreativesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Creatives';





    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Creatives());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Creatives name'));
        $grid->column('link', __('Creatives link'))->link();
        $grid->column('created_at', __('Create at'));
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
        $show = new Show(Creatives::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Creatives name'));
        $show->field('link', __('Creatives link'));
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
        $form = new Form(new Creatives());

        $form->text('name', __('Creatives name'));
        $form->url('link', __('Creatives link'));
        $form->datetime('created_at', __('Create at'))->default(date('Y-m-d H:i:s'));


        return $form;
    }


}
