<?php

namespace App\Admin\Controllers;

use App\Models\Creatives;
use App\Models\Delivery;
use App\Models\LandPage;
use App\Models\Offer;
use App\Models\OfferTracks;
use App\Models\OfferTracksCates;
use App\Models\Product;
use App\Models\ProductsFeed;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Illuminate\Support\Facades\DB;

class ProductFeedController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'ProductsFeed';
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new ProductsFeed());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('link', __('Link'))->link();
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
        $show = new Show(ProductsFeed::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('title'));
        $show->field('link', __('Link'));
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
        $form = new Form(new ProductsFeed());

        $form->text('title', __('Title'))->required();
        $form->url('link', __('Link'))->required();
        $form->datetime('created_at', __('Create at'))->default(date('Y-m-d H:i:s'));
//        $form->datetime('update_at', __('Update at'))->default(date('Y-m-d H:i:s'));

        return $form;
    }


}
