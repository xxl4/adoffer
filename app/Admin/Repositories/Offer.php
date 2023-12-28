<?php

namespace App\Admin\Repositories;

use App\Models\Offer as OfferModel;
use Dcat\Admin\Repositories\EloquentRepository;

class Offer extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = OfferModel::class;
}
