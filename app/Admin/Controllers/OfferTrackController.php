<?php

namespace App\Admin\Controllers;

use App\Models\Creatives;
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

class OfferTrackController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'offer_track';
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new OfferTracks());

        $grid->column('id', __('Id'));
        $grid->column('track_name', __('Track Name'));
//        $grid->column('track_link', __('Track Link'))->link();
//        $grid->column('track_type_id', __('Type'));
        $grid->column('created_at', __('Create at'));
//        $grid->column('updated_at', __('Update at'));
        // 去掉操作中的功能项
        $grid->actions(function ($actions) {
            // 去掉查看
            $actions->disableView();
        });
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
        $show = new Show(OfferTracks::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('track_name', __('Track Name'));
//        $show->field('track_link', __('Track Link'));
        $show->field('track_type_id', __('Track Tab'));
        $show->field('created_at', __('Create at'));
//        $show->field('updated_at', __('Update at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new OfferTracks());

        $form->text('track_name', __('Track name'))->required();
//        $form->url('track_link', __('Track Link'))->required();
        $form->select('land_id', __('Land Page'))->options(LandPage::all()->pluck('land_link', 'id'))->required();
        $form->select('track_type_id', __('Track Type'))->options(OfferTracksCates::all()->pluck('track_cate', 'id'))->required();
        $form->datetime('created_at', __('Create at'))->default(date('Y-m-d H:i:s'));
//        $form->datetime('update_at', __('Update at'))->default(date('Y-m-d H:i:s'));

        return $form;
    }


}
