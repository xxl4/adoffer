<?php

namespace App\Admin\Controllers;

use App\Models\LandPage;
use App\Models\OfferLog;
use App\Models\OfferTracksCates;
use App\Models\TagsModel;
use App\Models\TrackLists;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class TrackListsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Token';
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new TrackLists());

        $grid->column('id', __('Id'));
        $grid->column('random', __('Token'));
        $grid->column('created_at', __('Create at'))->default(date('Y-m-d H:i:s'));
        $grid->disableActions();
        $grid->disableCreation();
//        $grid->disablePagination();//禁用分页
        $grid->model()->orderBy('created_at','desc')->limit(10);
        $grid->disableExport();
        $grid->disableColumnSelector();
//        $grid->disableFilter();
        $grid->paginate(10);

        $grid->filter(function (Grid\Filter $filter) {
            // 也可以添加更多的搜索条件
            $filter->like('random', 'Token');
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
        $show = new Show(TrackLists::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('random', __('Token'));
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
        $form = new Form(new TrackLists());
        $form->text('random', __('Token'))->required();
        $form->datetime('created_at', __('Create at'))->default(date('Y-m-d H:i:s'));
        return $form;
    }
}
