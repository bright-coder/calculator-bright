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
})->name('home');

Route::match(['get','post'],'add','InputController@add')->name('add');

Route::match(['get','post'],'minus','InputController@minus')->name('minus');

Route::match(['get','post'],'multiply','InputController@multiply')->name('multiply');

Route::match(['get','post'],'divide','InputController@divide')->name('divide');