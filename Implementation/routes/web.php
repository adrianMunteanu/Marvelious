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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');
Route::get('comics', 'HomeController@index')->name('comics');
Route::get('events', 'HomeController@events')->name('events');
Route::get('characters', 'HomeController@characters')->name('characters');
Route::get('character/{id}', 'HomeController@character')->name('character');
