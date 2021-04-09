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

//DocumentViewer Library
Route::any('ViewerJS/{all?}', function () {
    return View::make('ViewerJS.index');
});

//frontend
Route::get('/', 'FrontendController@index');
Route::get('/warta', 'FrontendController@listWarta');
Route::get('/warta/view/{id}', 'FrontendController@viewWarta');

Route::get('/liturgi', 'FrontendController@listLiturgi');
Route::get('/liturgi/view/{id}', 'FrontendController@viewLiturgi');

Route::get('/video', 'FrontendController@listVideo');
Route::get('/video/view/{id}', 'FrontendController@viewVideo');

//admin
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('role:admin')->get('admin/dashboard', 'HomeController@dashboard')->name('dashboard');
Route::middleware('role:admin')->get('admin/week', 'HomeController@week')->name('week');

Route::middleware('role:admin')->get('admin/jemaat', 'HomeController@jemaat')->name('jemaat');
Route::middleware('role:admin')->get('admin/pernikahan', 'HomeController@pernikahan')->name('pernikahan');

Route::middleware('role:admin')->get('admin/liturgi', 'LiturgiController@index')->name('liturgi');
Route::middleware('role:admin')->get('admin/liturgi/{id}/edit', 'LiturgiController@edit')->name('edit_liturgi');
Route::middleware('role:admin')->get('admin/liturgi/create', 'LiturgiController@create')->name('create_liturgi');
Route::middleware('role:admin')->post('admin/liturgi/{id}/update', 'LiturgiController@update')->name('update_liturgi');
Route::middleware('role:admin')->post('admin/liturgi/store', 'LiturgiController@store')->name('store_liturgi');
Route::middleware('role:admin')->get('admin/liturgi/{id}/delete', 'LiturgiController@destroy')->name('delete_liturgi');

Route::middleware('role:admin')->get('admin/warta', 'WartaController@index')->name('warta');
Route::middleware('role:admin')->get('admin/warta/{id}/edit', 'WartaController@edit')->name('edit_warta');
Route::middleware('role:admin')->get('admin/warta/create', 'WartaController@create')->name('create_warta');
Route::middleware('role:admin')->post('admin/warta/{id}/update', 'WartaController@update')->name('update_warta');
Route::middleware('role:admin')->post('admin/warta/store', 'WartaController@store')->name('store_warta');
Route::middleware('role:admin')->get('admin/warta/{id}/delete', 'WartaController@destroy')->name('delete_warta');

Route::middleware('role:admin')->get('admin/video', 'VideoController@index')->name('video');
Route::middleware('role:admin')->get('admin/video/{id}/edit', 'VideoController@edit')->name('edit_video');
Route::middleware('role:admin')->get('admin/video/create', 'VideoController@create')->name('create_video');
Route::middleware('role:admin')->post('admin/video/{id}/update', 'VideoController@update')->name('update_video');
Route::middleware('role:admin')->post('admin/video/store', 'VideoController@store')->name('store_video');
Route::middleware('role:admin')->get('admin/video/{id}/delete', 'VideoController@destroy')->name('delete_video');

//google upload
Route::get('/test', function () {
    Storage::disk('google')->put('test.txt', 'samlekom');
    dd('bruh');
});

Route::post('/upload', function (Request $request) {
    dd($request->file("thing")->store("", "google"));
})->name("upload");
