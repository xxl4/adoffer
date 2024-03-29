<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
class Offer extends Model
{
    use SoftDeletes;
    use HasApiTokens, HasFactory;


    protected $dates = ['deleted_at'];

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


    public function offerLogs()
    {
        return $this->hasMany(OfferLog::class);
    }

// 定义一对多关系
    public function comments()
    {
        return $this->hasMany(Category::class);
    }
//    public function tags()
//    {
//        return $this->belongsToMany(Geos::class);
//    }

    public function getCateIdAttribute($value)
    {
        return explode(',', $value);
    }

    public function setCateIdAttribute($value)
    {
        $this->attributes['cate_id'] = implode(',', $value);
    }


    public function getAcceptedAreaAttribute($value)
    {
        return explode(',', $value);
    }

    public function setAcceptedAreaAttribute($value)
    {
        $this->attributes['Accepted_Area'] = implode(',', $value);
    }


    public function getCreativesIdAttribute($value)
    {
        return explode(',', $value);
    }

    public function setCreativesIdAttribute($value)
    {
        $this->attributes['creatives_id'] = implode(',', $value);
    }



    public function getProductFeedIdAttribute($value)
    {
        return explode(',', $value);
    }

    public function setProductFeedIdAttribute($value)
    {
        $this->attributes['product_feed_id'] = implode(',', $value);
    }



    public function getAdminRolesIdAttribute($value)
    {
        return explode(',', $value);
    }

    public function setAdminRolesIdAttribute($value)
    {
        $this->attributes['admin_roles_id'] = implode(',', $value);
    }


    public function getTrackCateIdAttribute($value)
    {
        return explode(',', $value);
    }

    public function setTrackCateIdAttribute($value)
    {
        $this->attributes['track_cate_id'] = implode(',', $value);
    }
    protected function serializeDate(\DateTimeInterface $date)
    {

        return $date->format('Y-m-d H:i:s');

    }
    public function getTrackContentAttribute($value)
    {
        return array_values(json_decode($value, true) ?: []);
    }
    public function getCreativeContentAttribute($value)
    {
        return array_values(json_decode($value, true) ?: []);
    }

    public function getOffersDomainAttribute($value)
    {
        return array_values(json_decode($value, true) ?: []);
    }

}
