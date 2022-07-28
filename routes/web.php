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

Route::get('/', function () {
    return view('starter');
});

Route::get('login','App\Http\Controllers\AuthController@index')->name('login');
Route::post('proses_login','App\Http\Controllers\AuthController@proses_login')->name('proses_login');
Route::get('logout','App\Http\Controllers\AuthController@logout')->name('logout');

Route::group(['middleware' => ['auth']], function(){
    Route::group(['middleware' => ['cek_login:admin']], function () {
        Route::get('admin','App\Http\Controllers\AdminController@index')->name('admin');
    });
    Route::group(['middleware' => ['cek_login:manager']], function () {
        Route::get('manager','App\Http\Controllers\ManagerController@index')->name('manager');
    });
    Route::group(['middleware' => ['cek_login:pegawai']], function () {
        Route::get('pegawai','App\Http\Controllers\PegawaiController@index')->name('pegawai');
    });
});