<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class Notifica extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'notifica';
    public $timestamps = false;

}
