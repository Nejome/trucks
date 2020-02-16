<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    
    public function category() {
        
        return $this->belongsTo('App\Category');
        
    }
    
}
