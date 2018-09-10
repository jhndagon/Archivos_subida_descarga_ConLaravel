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
    return view('welcomes');
});

Route::get('/archivo', 'ArchivoController@index');

Route::post('/archivo', 'ArchivoController@store');

Route::get('/docs', 'ArchivoController@archivos');

Route::get('/docs/{id}/{nombre}', 'ArchivoController@obtenerArchivo');