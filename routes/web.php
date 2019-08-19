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

Route::get('/comida', 'rComidaController@index')->name('ver_comida');
Route::get('/comida/ver', 'rComidaController@ver')->name('tabla_comida');;
Route::post('/comida/register', 'rComidaController@register')->name('registro_comida');
Route::post('/comida/editar', 'rComidaController@update')->name('editar_comida');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
