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

Route::name('admin.')->prefix('admin')->middleware(['auth:web','admin'])->group(function () {
    Route::get('/', 'AdminController@index')->name('index');
    
    Route::get('languages', 'LanguageController@index')->name('languages');
    Route::get('translation/{target}', 'LanguageController@translationFile')->name('languages.translation');
    Route::post('translation/{target}', 'LanguageController@updateTranslationFile')->name('languages.translation.update');

    Route::resource('type-shop', 'TypeShopController');
    Route::resource('blogs-theme', 'Blog_themeController');
    Route::resource('themes', 'ThemeController');
    Route::resource('offre', 'OfferController');
    Route::resource('blogs', 'BlogController');
    Route::resource('collections', 'CollectionController');
    Route::resource('super_cat', 'SuperCategoryController');
    Route::resource('categorie', 'CategoryController');
    Route::resource('devise', 'DeviseController');
    Route::resource('manager_user', 'ManagerUserController');
    Route::resource('approved_shop','ApprovedShopController');
    Route::resource('subscription', 'SubscriptionController');
});

Route::get('/', 'HomeController@index')->name('index');
Route::get('contact', 'HomeController@contact')->name('contact');

Route::get('locale/{locale}', 'LanguageController@setLocale')->name('locale');
Route::get('devise/{devise}', 'HomeController@setDevise')->name('devise');

Route::group(['middleware' => 'auth:web'], function () {
    Route::group(['prefix' => 'my-account'], function () {
        Route::get('/', 'UserController@profile')->name('user.profile');
        Route::get('my-favorites', 'UserController@favorites')->name('user.favorites');
        Route::get('change-password', 'UserController@updatePassword')->name('user.update.password');
    });  
});

Route::name('shop.')->prefix('my-shop')->middleware(['auth:web'])->group(function () {
    Route::get('/', 'ShopController@show')->name('show');
    Route::get('create', 'ShopController@create')->name('create');
    Route::post('store', 'ShopController@store')->name('store');
    Route::get('edit', 'ShopController@edit')->name('edit');
    Route::put('update', 'ShopController@update')->name('update');
    Route::put('update/images', 'ShopController@images')->name('update.images');

    # Routes of Products for vendor
    Route::resource('product', 'Shop\ProductController');
    Route::get('product/status/{id}', 'Shop\ProductController@status')->name('product.status');

    Route::get('collections/{id}', 'Shop\ProductController@collection');
    Route::get('categories/{id}', 'Shop\ProductController@category');
    Route::get('galleries/{id}/{product}', 'Shop\ProductController@gallery')->name('product.gallery');
    
    # Routes of Blogs for vendor
    Route::resource('blog', 'Shop\BlogController');

    Route::resource('subscription', 'Shop\SubscriptionController');
});

Route::get('products/{collection?}/{superCategory?}/{category?}', 'ProductController@index')->name('product.index');
Route::get('product/{name}/{id}', 'ProductController@show')->name('product.show');
Route::get('shop/{name}', 'ShopController@detail')->name('shop.detail');
