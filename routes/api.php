<?php


Route::get('categories', 'api\MainController@categories');

Route::get('app-version', 'api\MainController@appVersion');

Route::get('trucks', 'api\MainController@trucks');
