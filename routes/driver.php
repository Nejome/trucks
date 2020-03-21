<?php

/*========== Driver ==========*/
Route::post('login', 'api\driver\DriverController@login');

Route::group(['middleware' => 'auth:driver'], function(){

    /*==========Driver==========*/
    Route::get('logout', 'api\driver\DriverController@logout');
    Route::post('update-location', 'api\driver\DriverController@updateLocation');

    /*==========Orders==========*/
    Route::post('orders/{order}/change-status', 'api\driver\HomeController@changeStatus');
    Route::get('orders/{order}/details', 'api\driver\HomeController@details');

});
