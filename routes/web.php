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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::resource('/ringtones', 'App\Http\Controllers\Backend\RingtoneController')->middleware('auth');

Route::get('/','App\Http\Controllers\Frontend\RingtoneController@index');
Route::get('/ringtones/{id}/{slug}','App\Http\Controllers\Frontend\RingtoneController@show')->name('ringtones.show');
Route::post('/ringtones/download/{id}','App\Http\Controllers\Frontend\RingtoneController@downloadRingtone')->name('ringtones.download');

Route::get('/categories/{id}','App\Http\Controllers\Frontend\RingtoneController@category')->name('ringtones.category');



Route::resource('/photos','App\Http\Controllers\Backend\PhotoController')->middleware('auth');

Route::get('/wallpaper','App\Http\Controllers\Frontend\PhotoController@wallpaper');

Route::post('/download1/{id}','App\Http\Controllers\Frontend\PhotoController@download800x600')->name('download1');
Route::post('/download2/{id}','App\Http\Controllers\Frontend\PhotoController@download118x95')->name('download2');
Route::post('/download3/{id}','App\Http\Controllers\Frontend\PhotoController@download316x215')->name('download3');
Route::post('/download4/{id}','App\Http\Controllers\Frontend\PhotoController@download1280x1024')->name('download4');


Auth::routes([
    'register'=>false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
