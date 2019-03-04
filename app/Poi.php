<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poi extends Model
{
    public function categories()
    {
    	return $this->hasOne('App\Category','id','cat_id');
    }
}
