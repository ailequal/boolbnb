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
    return view('my-home');
})->name('my-home');;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/flats', 'FlatController@index')->name('flats');
Route::get('/flats/{slug}', 'FlatController@show')->name('show-flat');

Route::name('registereduser.')->namespace('RegisteredUser')->middleware('auth')->prefix('registereduser')->group(function () {
    Route::resource('flats','FlatController');
});
