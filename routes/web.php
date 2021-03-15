<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::middleware('role:admin')->get('/liturgi', 'LiturgiController@index')->name('liturgi');
Route::middleware('role:admin')->get('/liturgi/{id}/edit', 'LiturgiController@edit')->name('edit_liturgi');
Route::middleware('role:admin')->get('/liturgi/create', 'LiturgiController@create')->name('create_liturgi');
Route::middleware('role:admin')->post('/liturgi/{id}/update', 'LiturgiController@update')->name('update_liturgi');
Route::middleware('role:admin')->post('/liturgi/store', 'LiturgiController@store')->name('store_liturgi');
Route::middleware('role:admin')->get('/liturgi/{id}/delete', 'LiturgiController@destroy')->name('delete_liturgi');

Route::middleware('role:admin')->get('/warta', 'WartaController@index')->name('warta');
Route::middleware('role:admin')->get('/warta/{id}/edit', 'WartaController@edit')->name('edit_warta');
Route::middleware('role:admin')->get('/warta/create', 'WartaController@create')->name('create_warta');
Route::middleware('role:admin')->post('/warta/{id}/update', 'WartaController@update')->name('update_warta');
Route::middleware('role:admin')->post('/warta/store', 'WartaController@store')->name('store_warta');
Route::middleware('role:admin')->get('/warta/{id}/delete', 'WartaController@destroy')->name('delete_warta');

//google upload
Route::get('/test', function () {
    Storage::disk('google')->put('test.txt', 'samlekom');
    dd('bruh');
});

Route::post('/upload', function (Request $request) {
    dd($request->file("thing")->store("", "google"));
})->name("upload");
