<?php

namespace App\Admin\Repositories;

use App\Models\SaleRecord as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class SaleRecord extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
