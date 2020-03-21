<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{

    use HasApiTokens;

    protected $guard = 'customer';

    public function orders() {

        return $this->hasMany('App\Order');

    }

}
