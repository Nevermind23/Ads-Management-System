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

use Illuminate\Support\Facades\Route;

Route::get('report/ads/{days}', 'AdsController@adsReport');
Route::get('report/countries', 'AdsController@countriesReport');

Route::get('/click/index', 'ClickController@index');
Route::get('/click/view/{id}', 'ClickController@show')->name('click.show');

Route::get('/click/create', 'ClickController@create');
Route::post('/click/create', 'ClickController@store');
Route::get('/click/edit/{id}', 'ClickController@edit');
Route::post('/click/edit/{id}', 'ClickController@update');
Route::get('/click/delete/{id}', 'ClickController@destroy');
