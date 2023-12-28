<?php

namespace App\Admin\Renderable;

use App\Models\Category as CategoryModel;
use Dcat\Admin\Support\LazyRenderable;
use Dcat\Admin\Widgets\Table;


class Category extends LazyRenderable
{
    public function render()
    {
        // 获取ID
        $id = $this->key;
        // 获取其他自定义参数
        $cate_id = $this->cate_id;

        $data = CategoryModel::where('id', $cate_id)
            ->get(['id', 'category_name'])
            ->toArray();
        $titles = [
            'Cate ID',
            'Cate Content',
        ];

        return Table::make($titles, $data);

    }


}
