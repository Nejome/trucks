<?php

/*==========Customer==========*/
Route::post('login', 'api\customer\CustomerController@login');
Route::post('register', 'api\customer\CustomerController@register');

Route::group(['middleware' => 'auth:customer'], function(){

    /*==========Customer==========*/
    Route::post('update', 'api\customer\CustomerController@update');
    Route::get('logout', 'api\customer\CustomerController@logout');

    /*==========Driver==========*/
    Route::get('driver/{driver}/get-location', 'api\customer\HomeController@getDriverLocation');

    /*==========Orders==========*/
    Route::post('orders/get-price', 'api\customer\OrdersController@getPrice');
    Route::post('orders/create', 'api\customer\OrdersController@create');
    Route::post('orders/{order}/change-status', 'api\customer\OrdersController@changeStatus');
    Route::get('orders/{order}/details', 'api\customer\OrdersController@details');
    Route::get('orders/my-orders', 'api\customer\OrdersController@myOrders');

});
