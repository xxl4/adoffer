<?php

namespace App\Admin\Controllers;

use App\Models\Product;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
class ProductController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Product';


    public function show($id, Content $content)
    {





        $product = Product::where('offer_status',1)->get()->toArray();

        print_r("<pre/>");
        print_r($product);exit;

        return $content->title('详情')
            ->description('简介')
            ->view('product.show', compact('product'));
    }




    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Product());

        $grid->column('id', __('Id'));
        $grid->column('offer_name', __('Offer name'));
        $grid->column('cate_id', __('Cate id'));
        $grid->column('des', __('Des'));
        $grid->column('offer_link', __('Offer link'));
        $grid->column('offer_price', __('Offer price'));
        $grid->column('offer_status', __('Offer status'));
        $grid->column('create_at', __('Create at'));
        $grid->column('update_at', __('Update at'));

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
        $show = new Show(Product::findOrFail($id));

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
        $form = new Form(new Product());

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
