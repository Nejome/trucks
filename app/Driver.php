<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Driver extends Authenticatable
{

    use HasApiTokens;

    protected $guard = 'driver';

}
