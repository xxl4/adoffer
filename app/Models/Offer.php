<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Offer extends Model
{
    use HasApiTokens, HasFactory;

    protected $fillable = [
        'offer_name',
        'cate_id',
        'des',
        'offer_link',
        'offer_price',
        'offer_cate',
        'offer_status',
        'track_des',
        'accepted_area',
        'track_cate_id',
        'offer_price',
        'image'
    ];

// 定义一对多关系
    public function comments()
    {
        return $this->hasMany(Category::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Geos::class);
    }
}
