<?php

namespace App\Admin\Repositories;

use App\Models\OfferLog as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class OfferLog extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
