<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class OfferLog extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'offer_log';
    public $timestamps = false;

}
