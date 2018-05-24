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
    return view('inicio');
});


Route::get('/menu', function () {
    return view('menu');
});

Route::get('/contato', function () {
    return view('contact');
});


Route::post('reserva', 'ReservaController@store');

Route::get('reserva_action/id/{id}', 'ReservaController@update');

Auth::routes();

Route::get('/home', 'ReservaController@index')->name('home');
