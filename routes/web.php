<?php

use App\Http\Controllers\Admin\Main as AdminMain;
use App\Http\Controllers\Admin\Category as AdminCategory;
use App\Http\Controllers\Admin\Post as AdminPost;
use App\Http\Controllers\Admin\Tag as AdminTag;
use App\Http\Controllers\Admin\User as AdminUser;
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
    Route::get('/', Main\IndexController::class)
        ->name('home');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin', 'verified']], function (){
    Route::group(['as' => 'admins.'], function () {
        Route::get('/', AdminMain\IndexController::class)
            ->name('main');
    });

    Route::group(['prefix' => 'users', 'as' => 'admin.user.'], function () {
        Route::get('/', AdminUser\IndexController::class)
            ->name('index');
        Route::get('/create', AdminUser\CreateController::class)
            ->name('create');
        Route::post('/', AdminUser\StoreController::class)
            ->name('store');

        Route::group(['prefix' => '{user}'], function (){
            Route::get('/edit', AdminUser\EditController::class)
                ->name('edit');
            Route::patch('/edit', AdminUser\UpdateController::class)
                ->name('edit');
            Route::get('/show', AdminUser\ShowController::class)
                ->name('show');
            Route::delete('/delete', AdminUser\DeleteController::class)
                ->name('delete');
            Route::patch('/restore', AdminUser\RestoreController::class)
                ->name('restore');
        });
    });

    Route::group(['prefix' => 'posts', 'as' => 'admin.post.'], function () {
        Route::get('/', AdminPost\IndexController::class)
            ->name('index');
        Route::get('/create', AdminPost\CreateController::class)
            ->name('create');
        Route::post('/', AdminPost\StoreController::class)
            ->name('store');

        Route::group(['prefix' => '{post}'], function (){
            Route::get('/edit', AdminPost\EditController::class)
                ->name('edit');
            Route::patch('/edit', AdminPost\UpdateController::class)
                ->name('edit');
            Route::get('/show', AdminPost\ShowController::class)
                ->name('show');
            Route::delete('/delete', AdminPost\DeleteController::class)
                ->name('delete');
            Route::patch('/restore', AdminPost\RestoreController::class)
                ->name('restore');
        });
    });

    Route::group(['prefix' => 'categories', 'as' => 'admin.category.'], function () {
        Route::get('/', AdminCategory\IndexController::class)
            ->name('index');
        Route::get('/create', AdminCategory\CreateController::class)
            ->name('create');
        Route::post('/', AdminCategory\StoreController::class)
            ->name('store');

        Route::group(['prefix' => '{category}'], function (){
           Route::get('/edit', AdminCategory\EditController::class)
               ->name('edit');
            Route::patch('/edit', AdminCategory\UpdateController::class)
                ->name('edit');
            Route::get('/show', AdminCategory\ShowController::class)
                ->name('show');
            Route::delete('/delete', AdminCategory\DeleteController::class)
                ->name('delete');
            Route::patch('/restore', AdminCategory\RestoreController::class)
                ->name('restore');
        });
    });

    Route::group(['prefix' => 'tags', 'as' => 'admin.tag.'], function () {
        Route::get('/', AdminTag\IndexController::class)
            ->name('index');
        Route::get('/create', AdminTag\CreateController::class)
            ->name('create');
        Route::post('/', AdminTag\StoreController::class)
            ->name('store');

        Route::group(['prefix' => '{tag}'], function (){
            Route::get('/edit', AdminTag\EditController::class)
                ->name('edit');
            Route::patch('/edit', AdminTag\UpdateController::class)
                ->name('edit');
            Route::get('/show', AdminTag\ShowController::class)
                ->name('show');
            Route::delete('/delete', AdminTag\DeleteController::class)
                ->name('delete');
            Route::patch('/restore', AdminTag\RestoreController::class)
                ->name('restore');
        });
    });
});

Auth::routes(['verify' => true]);

