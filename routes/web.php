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




Route::get('/menu', function () {
    return view('menu');
});

Route::get('/contato', function () {
    return view('contact');
});


Route::get('/', 'InicioController@index');

Route::post('/reserva', 'CadastraReservaController@store');
Route::post('/cadastra_cardapio', 'CadastraCardapioController@store');
Route::post('/atualiza_cardapio', 'AtualizaCardapioController@update');

Route::post('reserva_action_c', 'ConfirmaReservaController@update')->name('reserva_action');
Route::post('reserva_action_e', 'ExcluiReservaController@update');

Auth::routes();

Route::get('/home', 'ListaReservaController@index')->name('home');

Route::get('/admin', 'AdminController@index')->name('home');
