<?php

/*==========Customer==========*/
Route::post('login', 'api\customer\CustomerController@login');
Route::post('register', 'api\customer\CustomerController@register');

Route::group(['middleware' => 'auth:customer'], function(){

    /*==========Customer==========*/
    Route::post('update', 'api\customer\CustomerController@update');
    Route::get('logout', 'api\customer\CustomerController@logout');

    /*==========Orders==========*/
    Route::post('orders/create', 'api\customer\OrdersController@create');

});
