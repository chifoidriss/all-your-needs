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

