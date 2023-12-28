<?php

namespace App\Admin\Renderable;
use App\Models\Offer  as OfferModel;
use Dcat\Admin\Support\LazyRenderable;
use Dcat\Admin\Widgets\Table;

class Offer extends LazyRenderable
{
    public function render()
    {
        // 获取ID
        $id = $this->key;
        // 获取其他自定义参数
        $cate_id = $this->cate_id;

        $id=  intval($id);
        $data = OfferModel::where('id', $id)
            ->get(['accepted_area'])
            ->toArray();
        $titles = [
            'Content',
        ];
        return Table::make($titles, $data);
    }
}
