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
        Route::get('my-favorites', 'UserController@favorites')->name('user.favorites');
        Route::get('change-password', 'UserController@updatePassword')->name('user.update.password');
    });
    
    Route::get('create-my-shop', 'ShopController@create')->name('shop.create');
    Route::post('store-my-shop', 'ShopController@store')->name('shop.store');
    Route::group(['prefix' => 'shop'], function () {
        Route::get('/', 'ShopController@show')->name('shop.show');
    });
});
Route::get('/', function () {
    return view('index');
});

Route::get("/dash",function(){
    return view('');
});

// route view index categorie

Route::get('/indexcat',function(){
    return view('categorie/index');
});

Route::get('/form',function(){
    return view('categorie/create');
});


//////////// route Collection///////////////////////////
Route::get('/create_collec',function(){
    return view ('collections/create');
});
Route::post('/create_collec','CollectionController@create');
Route::get('/indexcollec','CollectionController@index');
Route::get('/edit_collec/{id}','CollectionController@edit');
Route::post('/editcollec/{id}','CollectionController@update');
Route::DELETE('/deletecollec/{id}','CollectionController@destroy');
////////////////////////////////////////////////////////////


//////////// route Offre///////////////////////////
Route::get('/create_offert',function(){
    return view ('offre/create');
});
Route::post('/create_offert','OfferController@create');
Route::get('/indexoffert','OfferController@index');
Route::get('/edit_offert/{id}','OfferController@edit');
Route::post('/editoffert/{id}','OfferController@update');
Route::DELETE('/deleteoffert/{id}','OfferController@destroy');
////////////////////////////////////////////////////////////



//////////// route theme///////////////////////////
Route::get('/create_theme',function(){
    return view ('themes/create');
});
Route::post('/create_theme','ThemeController@create');
Route::get('/indextheme','ThemeController@index');
Route::get('/edit_theme/{id}','ThemeController@edit');
Route::post('/edittheme/{id}','ThemeController@update');
Route::DELETE('/deletetheme/{id}','ThemeController@destroy');
////////////////////////////////////////////////////////////

//////////// route type shops///////////////////////////
Route::get('/create_typeshop',function(){
    return view ('type_shop/create');
});
Route::post('/create_typeshop','TypeShopController@create');
Route::get('/indextypeshop','TypeShopController@index');
Route::get('/edit_typeshop/{id}','TypeShopController@edit');
Route::post('/edittypeshop/{id}','TypeShopController@update');
Route::DELETE('/deletetypeshop/{id}','TypeShopController@destroy');
////////////////////////////////////////////////////////////


//////////// route super category///////////////////////////
Route::get('/create_supercat','SuperCategoryController@index1');
Route::post('/create_supercat','SuperCategoryController@create');
Route::get('/indexsupercat','SuperCategoryController@index');
Route::get('/edit_supercat/{id}','SuperCategoryController@edit');
Route::post('/editsupercat/{id}','SuperCategoryController@update');
Route::DELETE('/deletesupercat/{id}','SuperCategoryController@destroy');
////////////////////////////////////////////////////////////

