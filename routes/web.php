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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::middleware('role:admin')->get('/dashboard', 'HomeController@dashboard')->name('dashboard');
Route::middleware('role:admin')->get('/week', 'HomeController@week')->name('week');

Route::middleware('role:admin')->get('/jemaat', 'HomeController@jemaat')->name('jemaat');
Route::middleware('role:admin')->get('/pernikahan', 'HomeController@pernikahan')->name('pernikahan');
