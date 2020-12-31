<?php

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

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@index');
});

Route::get('/', 'HomeController@index')->name('index');
Route::get('contact', 'HomeController@contact')->name('contact');

Route::group(['middleware' => 'auth:web'], function () {
    Route::group(['prefix' => 'my-account'], function () {
        Route::get('/', 'UserController@profile')->name('user.profile');
        Route::get('mes-avis', 'UserController@reviews')->name('user.reviews');
        Route::get('mes-messages', 'UserController@messages')->name('user.messages');
        Route::get('mes-favorites', 'UserController@favorites')->name('user.favorites');
        Route::get('change-password', 'UserController@updatePassword')->name('user.update.password');
    });
    
    Route::get('create-my-shop', 'ShopController@create')->name('shop.create');
    Route::post('store-my-shop', 'ShopController@store')->name('shop.store');
    Route::group(['prefix' => 'shop'], function () {
        Route::get('/', 'ShopController@show')->name('shop.show');
    });
});