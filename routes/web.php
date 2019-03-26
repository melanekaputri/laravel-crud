<?php

use Carbon\Traits\Rounding;

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

/**
 * Untuk route data siswa
 */
Route::get('/siswa', 'SiswaController@index');

/**
 * Untuk route create data siswa
 */
Route::post('/siswa/create', 'SiswaController@create');

/**
 * Untuk route edit data siswa
 */
Route::get('/siswa/{id}/edit','SiswaController@edit');
Route::post('/siswa/{id}/update','SiswaController@update');
