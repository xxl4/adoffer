<?php

namespace App\Admin\Renderable;
use App\Models\OfferTracks as OfferTracksModel;
use Dcat\Admin\Grid;
use Dcat\Admin\Grid\LazyRenderable;
use Dcat\Admin\Models\Administrator;

class OfferTracks extends LazyRenderable
{
    public function grid(): Grid
    {

        return Grid::make(new OfferTracksModel(), function (Grid $grid) {

            $grid->column('id', 'ID')->sortable();
            $grid->column('track_name');
            $grid->column('track_link')->link();
            $grid->quickSearch(['id', 'track_name']);
            $grid->paginate(10);
            $grid->disableActions();
            $keyword= $this->id;

            $keyword = intval($keyword);
            if ($keyword !== null) {
                $grid->model()->where('offer_id', $keyword);
            }
            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id')->width(4);
                $filter->like('track_name')->width(4);

                $filter->disableIdFilter();
            });
        });
    }

}
