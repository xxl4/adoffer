<?php
namespace App\Admin\Controllers;
use App\Admin\Renderable\Category;
use App\Admin\Renderable\Offer as OfferModel;
use App\Admin\Renderable\OfferTracks as OfferTracksModel;
use App\Admin\Renderable\Creatives as CreativesModel;
use App\Admin\Renderable\Category as CategoryModel;
use App\Admin\Repositories\Offer;
use App\Admin\Repositories\User;
use Dcat\Admin\Admin;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use App\Admin\Forms\Offer as offers;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Layout\Column;
use App\Admin\Actions\Grid\SwitchGridView;
use Dcat\Admin\Widgets\Card;
use Dcat\Admin\Support\LazyRenderable;
use Faker\Factory;
//use Dcat\Admin\Widgetsgets\Card;
use App\Http\Controllers\Controller;
use \Dcat\Admin\Traits\LazyWidget;

class OfferController extends Controller
{

//    protected $description = [
//        'index' => '启用 <a href="https://laravel.com/docs/8.x/pagination#simple-pagination" target="_blank">simplePaginate</a> 功能后可以提升页面的响应速度，如果你的表格不需要展示<b>总数</b>，那么就可以使用此方法进行分页。',
//    ];

    public function index(Content $content)
    {
        return $content
            ->header('边框模式')
            ->description('边框模式 + 异步加载功能演示')
            ->body($this->grid());
    }



    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    public function grid()
    {
        return new Grid(new Offer(), function (Grid $grid) {
            $grid->column('offer_name');
            $grid->column('des','Description')->limit(150);
            $grid->column('offer_price','Price')->limit(150);
            $grid->column('Summary')->display('Summary Detail')->modal(function (Grid\Displayers\Modal $modal) {
                // 标题
                $modal->title('分类详情');
                // 自定义图标
                $modal->icon('feather icon-edit');
                // 传递当前行字段值 payload
                return CategoryModel::make()->payload(['id'=>$this->id,'cate_id'=>$this->cate_id]);
            });

            $grid->column('AcceptedArea')->display('Detail')->modal('地区', OfferModel::make());
            $grid->column('offer_link')->display('Track Link')->modal(function (Grid\Displayers\Modal $modal) {
                // 标题
                $modal->title('Tracking List');
                // 自定义图标
                $modal->icon('feather icon-edit');
                // 传递当前行字段值 payload
                return OfferTracksModel::make()->payload(['id'=>$this->id]);
            });

            $grid->column('Creatives')->display('Creatives Link')->modal(function (Grid\Displayers\Modal $modal) {
                // 标题
                $modal->title('Tracking List');
                // 自定义图标
                $modal->icon('feather icon-edit');
                // 传递当前行字段值 payload
                return CreativesModel::make()->payload(['id'=>$this->id,'cate_id'=>$this->cate_id]);
            });
            $grid->column('offer_status')->using([1 => 'Normal', 2 => 'Hidden'])
                ->dot(
                    [
                        1 => 'primary',
                        2 => 'danger',
                    ],
                    'primary' // 第二个参数为默认值
                );
            $grid->column('create_at')->sortable();
            $grid->tableCollapse(false);
            $grid->withBorder();
            $grid->disableActions();
            $grid->disableBatchDelete();
            $grid->disableCreateButton();
            $grid->disableCreateButton();
            $grid->filter(function (Grid\Filter $filter) {
//                $filter->panel();
                $filter->between('create_at', '创建时间')->datetime();
                $filter->scope(1, admin_trans_field('month'))->where('create_at', '2023-12-24 18:30:39', '<=');
//                $filter->scope(2, admin_trans_label('quarter'))->where('create_at', 2019, '>=');
                $filter->scope(3, admin_trans_label('year'))->where('create_at', '2023-12-24 18:30:39', '>=');
                $filter->like('offer_name');
                $filter->like('des');
            });
        });





    }




    /**
     * @return string
     */
    protected function buildPreviewButton($class = 'btn-white')
    {
        $previewUrl = '/'.request()->path();

//        var_dump($previewUrl);exit;

        Admin::script(
            <<<SCRIPT
$('.btn-white').click(function () {
    layer.open({
        type: 2,
        title: '预览代码',
        area: ['65%', '80%'],

    });
});
SCRIPT

        );

        return "<button class='btn {$class} preview-code'> &nbsp;&nbsp;&nbsp;<i class=' fa  fa-code'></i>&nbsp;预览代码&nbsp;&nbsp;&nbsp; </button>&nbsp;";
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
        return Show::make($id, new Offer(), function (Show $show) {
            $show->field('id');
            $show->field('offer_name');
            $show->field('cate_id');
            $show->field('des');
            $show->field('offer_link');
            $show->field('offer_price');
            $show->field('offer_status');
            $show->field('create_at');
            $show->field('update_at');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Offer(), function (Form $form) {
            $form->display('id');
            $form->text('offer_name');
            $form->text('cate_id');
            $form->text('des');
            $form->text('offer_link');
            $form->text('offer_price');
            $form->text('offer_status');
            $form->text('create_at');
            $form->text('update_at');
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
