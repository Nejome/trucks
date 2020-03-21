<?php

use App\Order;

Broadcast::channel('orders', function ($user) {

    if(isset($user->available) && $user->available == 1){
        return true;
    }else{
        return false;
    }

});

Broadcast::channel('order.{orderId}', function ($user, $orderId) {

    return $user->id === Order::find($orderId)->customer_id;

});
