<?php
namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Creatives;
use App\Models\Offer;
use App\Models\OfferTracks;
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
        $grid->column('offer_link', __('Offer link'))->link();
        $grid->column('offer_price', __('Offer price'));
        $grid->column('offer_status', __('Offer status'))->using(['0' => 'Live', '1' => 'Paused'])->label([
            0 => 'success',
            1 => 'danger',
        ]);
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

    public function create(Content $content)
    {

        return $content
            ->title($this->title())
            ->description($this->description['create'] ?? trans('admin.create'))
            ->body($this->form());
    }


    public function show($id, Content $content)
    {


        $product = Offer::get()->toArray();

        print_r($product);exit;


        foreach ($product as $key => $value) {
            $product[$key]['track_list'] = OfferTracks::where('offer_id', $value['id'])->get()->toArray();
            $product[$key]['creatives'] = Creatives::where('offer_id', $value['id'])->get()->toArray();
        }

        return $content->title('详情')
            ->description('简介')
            ->view('product.show', compact('product'));
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Offer());
        $data = Category::get()->toArray();

        foreach ($data as $item){
            $_item=$item["id"];
            $_item1=$item["category_name"];
            $arr[$_item]=$_item1;
        }

        $form->multipleSelect('cate_id')->options($arr);



        //multiple
        $form->text('offer_name', __('Offer name'));
        $form->textarea('des', __('Des'));
        $form->url('offer_link', __('Offer link'));
        $form->textarea('track_des', __('Track Des'));
        $form->text('accepted_area', __('Accepted Area'));
        $form->image('image', __('Offer Image'))->downloadable();




        $form->decimal('offer_price', __('Offer price'));
        $form->switch('offer_status', __('Offer status'))->default(1);
        $form->datetime('create_at', __('Create at'))->default(date('Y-m-d H:i:s'));
        $form->datetime('update_at', __('Update at'))->default(date('Y-m-d H:i:s'));

//        $form->saving(function (Form $form) {
//            $form->cate_id = 1;
//        });



        return $form;
    }



}
