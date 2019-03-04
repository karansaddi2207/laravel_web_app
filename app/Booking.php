<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function ticket()
    {
    	return $this->hasOne('App\Ticket','id','ticket_id');
    }

    public function user()
    {
    	return $this->hasOne('App\User','id','user_id');
    }
}
