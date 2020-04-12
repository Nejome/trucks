<?php

use App\Order;
use Illuminate\Support\Facades\Auth;

Broadcast::channel('orders', function ($user) {

    return Auth::check();

    /*if(isset($user->available) && $user->available == 1){
        return true;
    }else{
        return false;
    }*/

});

Broadcast::channel('order.{orderId}', function ($user, $orderId) {

    return $user->id === Order::find($orderId)->customer_id;

});
