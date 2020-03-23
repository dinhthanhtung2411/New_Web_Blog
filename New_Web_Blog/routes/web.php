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

Route::get('/login', 'LoginController@index')->name('login.index');
Route::post('/login', 'LoginController@login')->name('login');
Route::get('/logout', 'LoginController@logout')->name('logout');

Route::get('/register', "RegisterController@show")->name("register.show");
Route::post('/register', "RegisterController@register")->name("register");

Route::middleware('checkLogin')->prefix('admin')->group(function (){
    Route::get('',function (){
        return view('admin.home');
    })->name('admin.home');
});

Route::prefix('user')->group(function () {
    Route::get('/', 'UserController@index')->name('admin.user.index');
    Route::get('/create', 'UserController@showFormCreate')->name('admin.user.create');
    Route::post('/store', 'UserController@store')->name('admin.user.store');
    Route::get('/{id}/edit', 'UserController@showFormEdit')->name('admin.user.edit');
    Route::post('/{id}/update', 'UserController@update')->name('admin.user.update');
    Route::get('/{id}/delete', 'UserController@delete')->name('admin.user.delete');
    Route::get('/search', 'UserController@search')->name('admin.user.search');
});


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/redirect/{social}', 'SocialAuthController@redirect');
Route::get('/callback/{social}', 'SocialAuthController@callback');
