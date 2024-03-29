<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', 'admin\SessionController@loginPage')->name('login');
Route::post('/login', 'admin\SessionController@login');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', 'admin\HomeController@index');

    /* Session */
    Route::get('/logout', 'admin\SessionController@logout');

    /* Settings routes */
    Route::get('/settings', 'admin\SettingsController@index');
    Route::post('/settings', 'admin\SettingsController@update');
    Route::post('/settings/change_password', 'admin\SettingsController@change_password');

    /* Drivers routes */
    Route::get('/drivers', 'admin\DriversController@index');
    Route::get('/drivers/{driver}/active', 'admin\DriversController@active');
    Route::get('/drivers/create', 'admin\DriversController@create');
    Route::post('/drivers/store', 'admin\DriversController@store');
    Route::get('/drivers/{driver}/charge_balance', 'admin\DriversController@charge_balance_page');
    Route::post('/drivers/{driver}/charge_balance', 'admin\DriversController@charge_balance');
    Route::get('/drivers/{driver}/edit', 'admin\DriversController@edit');
    Route::post('/drivers/{driver}/update', 'admin\DriversController@update');
    Route::get('/drivers/{driver}/delete', 'admin\DriversController@delete');

    /* Categories routes */
    Route::get('/categories', 'admin\CategoriesController@index');
    Route::get('/categories/{category}/edit', 'admin\CategoriesController@edit');
    Route::post('/categories/{category}/update', 'admin\CategoriesController@update');

    /* Trucks routes */
    Route::get('/trucks', 'admin\TrucksController@index');
    Route::get('/trucks/create', 'admin\TrucksController@create');
    Route::post('/trucks/store', 'admin\TrucksController@store');
    Route::get('/trucks/{truck}/edit', 'admin\TrucksController@edit');
    Route::post('/trucks/{truck}/update', 'admin\TrucksController@update');
    Route::get('/trucks/{truck}/delete', 'admin\TrucksController@delete');

    /* Customers routes */
    Route::get('/customers', 'admin\CustomersController@index');
    Route::get('/customers/{customer}/delete', 'admin\CustomersController@delete');

    /* Orders routes */
    Route::get('/orders', 'admin\OrdersController@index');
    Route::get('/orders/{order}/details', 'admin\OrdersController@details');
    Route::get('/orders/{order}/delete', 'admin\OrdersController@delete');

});
