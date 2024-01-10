<?php

namespace App\Admin\Controllers;

use App\Models\Creatives;
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

class OfferTrackCatesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'offer_tracks_cates';
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new OfferTracksCates());

        $grid->column('id', __('Id'));
        $grid->column('track_cate', __('Cate Name'));
        $grid->column('track_cate_des', __('Cate Des'));

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
        $show = new Show(OfferTracksCates::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('track_cate', __('Cate Name'));
        $show->field('track_cate_des', __('Cate Des'));
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new OfferTracksCates());

        $form->text('track_cate', __('Cate Name'))->required();
        $form->text('track_cate_des', __('Cate Des'));
        return $form;
    }


}
