<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingItem extends Model
{

    public function packet()
    {
        return $this->belongsTo('App\Packet');
    }

    public function file()
    {
        return $this->belongsTo('App\File');
    }

    
}

