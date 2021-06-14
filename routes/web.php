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
    return view('welcome');
});
Route::view('/mahasiswa', 'layouts.livewire');
// Route::view('/hello-world', 'layouts.livewire');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('siswa')->group( function(){
    Route::get('/', 'SiswaController@index')->name('user.index');
    Route::post('/store', 'SiswaController@store')->name('user.store');
    Route::put('/update/{id}', 'SiswaController@update')->name('user.update');
    Route::delete('/delete/{id}', 'SiswaController@delete')->name('user.delete');
});
