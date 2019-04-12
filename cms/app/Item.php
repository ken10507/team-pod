<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    // Team多対多リレーション
     public function teams(){
        return $this->belongsToMany('App\Team');
    }
    
    // Category多対多リレーション
     public function categories(){
        return $this->belongsToMany('App\Category');
    }
    
    // Language多対多リレーション
     public function languages(){
        return $this->belongsToMany('App\Language');
    }
    
    // Period多対多リレーション
     public function periods(){
        return $this->belongsToMany('App\Period');
    }
}
