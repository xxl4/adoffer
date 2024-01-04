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
        'cate_id'
    ];

//    public function category()
//    {
//        return $this->belongsToMany(Category::class);
//    }



    public function getTagsAttribute($value)
    {
        return explode(',', $value);
    }

    public function setTagsAttribute($value)
    {
        $this->attributes['cate_id'] = implode(',', $value);
    }
}
