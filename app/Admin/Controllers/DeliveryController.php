<?php

namespace App\Admin\Controllers;

use App\Models\Creatives;
use App\Models\Delivery;
use App\Models\LandPage;
use App\Models\Offer;
use App\Models\OfferTracks;
use App\Models\OfferTracksCates;
use App\Models\Product;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Illuminate\Support\Facades\DB;

class DeliveryController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'delivery';
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Delivery());

        $grid->column('id', __('Id'));
        $grid->column('delivery_name', __('Delivery Name'));
        $grid->column('delivery_link', __('Delivery Link'))->link();
        $grid->column('created_at', __('Create at'));
//        $grid->column('updated_at', __('Update at'));
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
        $show = new Show(Delivery::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('delivery_name', __('Delivery Name'));
        $show->field('delivery_link', __('Delivery Link'));
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
        $form = new Form(new Delivery());

        $form->text('delivery_name', __('Delivery name'))->required();
        $form->url('delivery_link', __('Delivery Link'))->required();
        $form->datetime('created_at', __('Create at'))->default(date('Y-m-d H:i:s'));
//        $form->datetime('update_at', __('Update at'))->default(date('Y-m-d H:i:s'));

        return $form;
    }


}
