<?php

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/','PagesController@home');
Route::get('/create','TicketsController@create');
Route::post('/create','TicketsController@store');
Route::get('/tickets','TicketsController@index');
Route::get('/ticket/{slug}','TicketsController@show');
Route::get('/ticket/{slug}/edit','TicketsController@edit');
Route::post('/ticket/{slug}/edit','TicketsController@update');
Route::post('/ticket/{slug}/delete','TicketsController@destroy');


Route::get('/about','PagesController@about');
Route::get('/contact','PagesController@contact');