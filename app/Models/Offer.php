<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
	use HasDateTimeFormatter;


    public function saleRecord()
    {
        return $this->hasMany(Offer::class);
    }

}
