<?php

namespace App\Admin\Controllers;

use App\Models\Creatives;
use App\Models\Delivery;
use App\Models\LandPage;
use App\Models\Message;
use App\Models\Offer;
use App\Models\OfferTracks;
use App\Models\OfferTracksCates;
use App\Models\Product;
use Encore\Admin\Auth\Database\Role;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Illuminate\Support\Facades\DB;

class MessageController extends AdminController
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
        $grid = new Grid(new Message());

        $grid->column('id', __('Id'));
        $grid->column('avatar', __('Avatar'))->image();

        $grid->column('msg_title', __('Title'));
        $grid->column('msg_des', __('Des'));
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
        $show = new Show(Message::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('avatar', __('Avatar'))->image();

        $show->field('msg_title', __('Title'));
        $show->field('msg_des', __('Des'));
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
        $form = new Form(new Message());
        $form->image('avatar', __('Avatar'));

        $form->text('msg_title', __('Title'))->required();
        $form->text('msg_des', __('Des'))->required();


        //$form->datetime('created_at', __('Create at'))->default(date('Y-m-d H:i:s'));
//        $form->datetime('update_at', __('Update at'))->default(date('Y-m-d H:i:s'));

        return $form;
    }


}
