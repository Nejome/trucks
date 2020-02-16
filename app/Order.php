<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    
    public function driver() {
        
        return $this->belongsTo('App\Driver');
        
    }

    public function customer() {

        return $this->belongsTo('App\Customer');

    }
    
}
