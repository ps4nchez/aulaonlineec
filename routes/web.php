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

Route::get('/', function () {
    return view('home');
});

Route::get('login', function () {
    return view('login');
});

Route::resource('inicio/institucion','InstitucionController');
Route::resource('inicio/director','DirectorController');

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout')->name('logout' );

//Route::get('/', 'HomeController@index')->name('/');
