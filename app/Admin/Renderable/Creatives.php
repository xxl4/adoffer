<?php

namespace App\Admin\Renderable;
use App\Models\Creatives as CreativessModel;
use Dcat\Admin\Grid;
use Dcat\Admin\Grid\LazyRenderable;

class Creatives extends LazyRenderable
{
    public function grid(): Grid
    {

        return Grid::make(new CreativessModel(), function (Grid $grid) {

            $grid->column('id', 'ID')->sortable();
            $grid->column('name');
            $grid->column('link')->link();

            $grid->quickSearch(['id', 'name']);
            $grid->paginate(10);
            $grid->disableActions();
            $keyword= $this->id;

            $keyword = intval($keyword);
            if ($keyword !== null) {
                $grid->model()->where('offer_id', $keyword);
            }
            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id')->width(4);
                $filter->like('name')->width(4);

                $filter->disableIdFilter();
            });
        });
    }


}
