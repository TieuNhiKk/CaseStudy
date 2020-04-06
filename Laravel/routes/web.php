<?php

use Illuminate\Support\Facades\Auth;
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
Route::view('/home', 'welcome')->name('home');

Route::group(['prefix' => 'tin-tuc'], function () {
    Route::get('/', 'PageController@tintuc')->name('tin-tuc');
    Route::get('/{post}', 'PageController@xemtin')->name('xem-tin');
});


Route::group(['prefix' => 'san-pham'], function () {
    Route::get('/', 'PageController@sanpham')->name('san-pham');
    Route::get('/{product}', 'PageController@xemsp')->name('xem-sp');
    Route::put('/', 'PageController@buy')->name('dat-hang');
    Route::delete('/{product}', 'PageController@delete')->name('xoa-sp');
});

Route::group(['prefix' => 'gio-hang', 'middleware' => 'auth'], function () {
    Route::get('/', 'OrderController@index')->name('gio-hang');
    Route::post('/{sp}', 'OrderController@addproduct')->name('themsp');
    Route::delete('/{sp}', 'OrderController@delete')->name('xoasp');
    Route::put('/{sp}', 'OrderController@update');
});

Route::resource('post', 'PostController')->middleware(['auth', 'can:admin']);
Route::resource('product', 'ProductController')->middleware(['auth', 'can:admin']);
Route::resource('order', 'OrderController')->only(['index', 'update', 'destoy']);
