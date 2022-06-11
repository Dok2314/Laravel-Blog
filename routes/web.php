<?php

use App\Http\Controllers\Admin\Main as AdminMain;
use App\Http\Controllers\Admin\Category as AdminCategory;
use App\Http\Controllers\Main as Main;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    Route::get('/', Main\IndexController::class);
});

Route::group(['prefix' => 'admin'], function (){
    Route::group([], function () {
        Route::get('/', AdminMain\IndexController::class);
    });

    Route::group(['prefix' => 'categories', 'as' => 'category.'], function () {
        Route::get('/', AdminCategory\IndexController::class)
            ->name('categories');
    });
});

Auth::routes();

