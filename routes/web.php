<?php

use App\Helpers\Routes\RouteHelper;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});


RouteHelper::routeFiles( __DIR__ . '/web');



