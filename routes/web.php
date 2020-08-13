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

//router login
Route::get('/login', 'Login\LoginController@getLogin')->name('login');
Route::post('/login', 'Login\LoginController@postLogin')->name('login');
Route::get('/logout', 'Login\LoginController@getLogout')->name('logout');

//router register
Route::get('/register','Register\RegisterController@getRegister')->name('register');
Route::post('/register','Register\RegisterController@postRegister')->name('register');

//router recover
Route::get('/recover','Recover\RecoverController@getRecover')->name('recover');
Route::post('/recover','Recover\RecoverController@postRecover')->name('recover');
Route::get('/reset','Recover\ResetController@getReset')->name('reset');
Route::post('/reset','Recover\ResetController@postReset')->name('reset');

/*router login
Route::get('/login','ConnectController@getLogin')->name('login');
Route::post('/login','ConnectController@postLogin')->name('login');
Route::get('/logout','ConnectController@getLogout')->name('logout');

//recover 
Route::get('/recover','ConnectController@getRecover')->name('recover');
Route::post('/recover','ConnectController@postRecover')->name('recover');
Route::get('/reset','ConnectController@getReset')->name('reset');
Route::post('/reset','ConnectController@postReset')->name('reset');

//router register
Route::get('/register','ConnectController@getRegister')->name('register');
Route::post('/register','ConnectController@postRegister')->name('register');*/
