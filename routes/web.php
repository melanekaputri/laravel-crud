<?php

use Carbon\Traits\Rounding;
use App\Http\Controllers\SiswaController;
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

Route::get('/', function () {
    return view('home');
});

//Route untuk login
Route::get('/login','AuthController@login')->name('login');
Route::post('postlogin','AuthController@postlogin');

//Route untuk logout
Route::get('/logout','AuthController@logout');

Route::group(['middleware' => ['auth','checkRole:admin']], function () {
        //Untuk route data siswa
        Route::get('/siswa', 'SiswaController@index');

        //Untuk route create data siswa
        Route::post('/siswa/create', 'SiswaController@create');
        
        //Untuk route edit data siswa
        Route::get('/siswa/{id}/edit','SiswaController@edit');
        Route::post('/siswa/{id}/update','SiswaController@update');

        // Route untuk delete data siswa
        Route::get('/siswa/{id}/delete','SiswaController@delete');

        //Route untuk profile
        Route::get('/siswa/{id}/profile','SiswaController@profile');

        //Route untuk tambah nilai 
        Route::post('/siswa/{id}/addnilai','SiswaController@addnilai');

        //Route detele nilai
        Route::get('/siswa/{id}/{idmapel}/deletenilai','SiswaController@deletenilai');

        //Route Export Excel Siswa
        Route::get('/siswa/exportexcel','SiswaController@exportExcel');

        //Route Export PDF Siswa
        Route::get('/siswa/exportpdf','SiswaController@exportPdf');



        //Route profile guru
        Route::get('/guru/{id}/profile','GuruController@profile');

        //Untuk route data guru
        Route::get('/guru', 'GuruController@index');

         // Route untuk delete data guru
         Route::get('/guru/{id}/delete','GuruController@delete');

         //Untuk route edit data guru
         Route::get('/guru/{id}/edit','GuruController@edit');
         Route::post('/guru/{id}/update','GuruController@update');
 
         //Untuk route create data guru
         Route::post('/guru/create', 'GuruController@create');

        //Route untuk tambah mapel
        Route::post('/guru/{id}/addmapel','GuruController@addmapel');
         

        //Untuk route data mapel
        Route::get('/mapel', 'MapelController@index');

        // Route untuk delete data mapel
        Route::get('/mapel/{id}/delete','MapelController@delete');

        //Untuk route edit data siswa
        Route::get('/mapel/{id}/edit','MapelController@edit');
        Route::post('/mapel/{id}/update','MapelController@update');

        //Untuk route create data siswa
        Route::post('/mapel/create', 'MapelController@create');
 
        Route::get('/user','UserController@index');
        // Route untuk delete data guru
        Route::get('/user/{id}/delete','GuruController@delete');

        //Untuk route edit data guru
        Route::get('/user/{id}/edit','UserController@edit');
        Route::post('/user/{id}/update','UserController@update');
        Route::post('/user/create', 'UserController@create');

});

Route::group(['middleware' => ['auth','checkRole:admin,siswa,guru']], function (){
        //Route untuk dashboard
        Route::get('/dashboard', 'DashboardController@index');
});


