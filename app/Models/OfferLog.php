<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferLog extends Model
{
    use HasFactory;


    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }

    public function offerData()
    {
        return $this->belongsTo(Offer::class, 'offer_id', 'id');
    }

    public function geos()
    {
        return $this->belongsTo(Geos::class, 'country_id', 'id');
    }


    public function comments()
    {
        return $this->hasMany(Offer::class);
    }

    public function country()
    {
        return $this->belongsTo(Geos::class);
    }





    //DateTimeInterface
    protected function serializeDate(\DateTimeInterface $date)

    {

        return $date->format('Y-m-d H:i:s');

    }


}
