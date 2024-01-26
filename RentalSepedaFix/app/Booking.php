<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['client_id', 'bike_id', 'available_bo', 'status', 'photo', 'booking_code', 'order_date', 'duration', 'return_date_supposed', 'return_date', 'fine', 'total_price'];

    public function client()
    {
        return $this->belongsTo('App\User');
    }

    public function bike()
    {
        return $this->belongsTo('App\Bike');
    }

    public function getPhoto(){
        return asset('/images/bukti'. $this->photo);
    }
}
