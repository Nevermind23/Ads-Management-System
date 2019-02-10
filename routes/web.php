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

Route::get('/click/index', 'ClickController@index')->name('click.index');
Route::get('/click/view', 'ClickController@show')->name('click.show');

Route::get('/click/create', 'ClickController@create')->name('click.create');
Route::post('/click/create', 'ClickController@store')->name('click.store');
Route::get('/click/edit/{id}', 'ClickController@edit')->name('click.edit');
Route::post('/click/edit/{id}', 'ClickController@update')->name('click.update');
Route::get('/click/delete/{id}', 'ClickController@destroy')->name('click.delete');
