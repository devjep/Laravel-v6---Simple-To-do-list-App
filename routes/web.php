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
Route::get( '/', function (){
    return view('auth.login');
});

//routes for todo lists
Route::get('/todolists', 'TodolistController@index')->name('todolists.index')->middleware('auth');
Route::post('/todolists', 'TodolistController@store')->name('todolists.store')->middleware('auth');
Route::post('/todolists/{task}','TodolistController@update')->name('todolists.update')->middleware('auth');
Route::delete('/todolists/{task}','TodolistController@destroy')->name('todolists.destroy')->middleware('auth');


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
