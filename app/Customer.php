<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function professionals()
    {
        return $this->belongsToMany('App\Professional', 'bookings');
    }

    public function bookings()
    {
        return $this->hasMany('App\Booking');
    }
}
