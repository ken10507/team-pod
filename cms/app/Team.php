<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    //
 
    // user多対多リレーション
    public function users(){
        return $this->belongsToMany('App\User');
    }
    
    // item多対多リレーション
    public function items(){
        return $this->belongsToMany('App\Item');
    }
}
