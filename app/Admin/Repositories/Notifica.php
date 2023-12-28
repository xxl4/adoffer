<?php

namespace App\Admin\Repositories;

use App\Models\Notifica as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Notifica extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
