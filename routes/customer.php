<?php

/*==========Customer==========*/
Route::post('login', 'api\customer\CustomerController@login');
Route::post('register', 'api\customer\CustomerController@register');

/*==========Categories==========*/
Route::get('categories', 'api\customer\CategoriesController@index');

Route::group(['middleware' => 'auth:customer'], function(){

    /*==========Customer==========*/
    Route::get('details', 'api\customer\CustomerController@details');
    Route::get('logout', 'api\customer\CustomerController@logout');
    Route::put('update', 'api\customer\CustomerController@update');

    /*==========Orders==========*/
    Route::post('orders/create', 'api\customer\OrdersController@create');

});
