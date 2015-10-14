<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function professional()
    {
        return $this->belongsTo('App\Professional');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
}
