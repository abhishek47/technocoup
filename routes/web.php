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

Route::get('/', 'PagesController@index');
Route::get('/products', 'PagesController@products');
Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');

Auth::routes();

Route::get('/home', 'HomeController@index');


Route::get('/trace', 'TrackingController@trace');
Route::get('/track', 'TrackingController@track');
