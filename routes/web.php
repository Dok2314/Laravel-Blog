<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main AS M;
use App\Http\Controllers\Admin\Main AS A;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([], function () {
    Route::get('/', M\IndexController::class);
});

Route::group(['prefix' => 'admin'], function (){
    Route::group([], function () {
        Route::get('/', A\IndexController::class);
    });
});

Auth::routes();

