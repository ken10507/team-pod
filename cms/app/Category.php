<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    // Item多対多リレーション
     public function items(){
        return $this->belongsToMany('App\Item');
    }
}
