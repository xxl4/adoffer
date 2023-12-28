<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class SaleRecord extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'sale_record';
    public $timestamps = false;



    public function Offer()
    {
        return $this->belongsTo(Offer::class);
    }


}
