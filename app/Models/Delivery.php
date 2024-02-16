<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Delivery extends Model
{
    use HasApiTokens, HasFactory;

    protected function serializeDate(\DateTimeInterface $date)
    {

        return $date->format('Y-m-d H:i:s');

    }

}
