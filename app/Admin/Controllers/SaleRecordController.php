<?php

namespace App\Admin\Controllers;

use App\Admin\Metrics\Dashboard\Offers;
use App\Admin\Repositories\SaleRecord;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;
class SaleRecordController extends AdminController
{

    public function index(Content $content)
    {
        return $content
            ->header('表格')
            ->description('表格功能展示')
            ->body(function (Row $row) {
                $row->column(4, new Offers());
                $row->column(4, new Offers());
                $row->column(4, new Offers());
            })
            ->body($this->grid());
    }


    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new SaleRecord(['offer']), function (Grid $grid) {
            $grid->column('id')->sortable();
//            $grid->column('offer_id');
            $grid->column('offer.offer_name');
            $grid->column('offer.offer_price');
            $grid->column('time');
            $grid->column('sale_date');
            $grid->column('create_at');
            $grid->column('update_at');

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');

            });
        });
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
        return Show::make($id, new SaleRecord(), function (Show $show) {
            $show->field('id');
            $show->field('offer_id');
            $show->field('time');
            $show->field('sale_date');
            $show->field('create_at');
            $show->field('update_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new SaleRecord(), function (Form $form) {
            $form->display('id');
            $form->text('offer_id');
            $form->text('time');
            $form->text('sale_date');
            $form->text('create_at');
            $form->text('update_at');
        });
    }
}
