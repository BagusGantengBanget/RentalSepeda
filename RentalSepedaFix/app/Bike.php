<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
    protected $fillable = ['merk_id', 'bike_name', 'bike_number', 'price', 'available', 'photo'];

    public function merk()
    {
        return $this->belongsTo('App\Merk');
    }

    public function getPhoto(){
        return asset('/images/bike_images/'. $this->photo);
    }
}
