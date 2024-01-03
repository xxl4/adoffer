<?php

namespace App\Admin\Controllers;

use App\Models\Offer;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Widgets\Table;
use Encore\Admin\Actions\RowAction;
use App\Admin\Actions\Post\Replicate;
class OfferController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Offer';


    public function handle(Model $model)
    {
        // 这里调用模型的`replicate`方法复制数据，再调用`save`方法保存
        $model->replicate()->save();

        // 返回一个内容为`复制成功`的成功信息，并且刷新页面
        return $this->response()->success('复制成功.')->refresh();
    }



    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Offer());

        $grid->column('id', __('Id'));
        $grid->column('offer_name', __('Offer name'));
        $grid->column('cate_id', __('Cate id'));
        $grid->column('des', __('Des'));
        $grid->column('offer_link', __('Offer link'));
        $grid->column('offer_price', __('Offer price'));
        $grid->column('offer_status', __('Offer status'));
        $grid->column('create_at', __('Create at'));
        $grid->column('update_at', __('Update at'));
        $grid->actions(function ($actions) {
            $actions->add(new Replicate);
        });
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
        $show = new Show(Offer::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('offer_name', __('Offer name'));
        $show->field('cate_id', __('Cate id'));
        $show->field('des', __('Des'));
        $show->field('offer_link', __('Offer link'));
        $show->field('offer_price', __('Offer price'));
        $show->field('offer_status', __('Offer status'));
        $show->field('create_at', __('Create at'));
        $show->field('update_at', __('Update at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Offer());

        $form->text('offer_name', __('Offer name'));
        $form->number('cate_id', __('Cate id'));
        $form->textarea('des', __('Des'));
        $form->text('offer_link', __('Offer link'));
        $form->decimal('offer_price', __('Offer price'));
        $form->switch('offer_status', __('Offer status'))->default(1);
        $form->datetime('create_at', __('Create at'))->default(date('Y-m-d H:i:s'));
        $form->datetime('update_at', __('Update at'))->default(date('Y-m-d H:i:s'));

        return $form;
    }



}
