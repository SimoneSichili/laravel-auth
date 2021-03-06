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

// route accesso libero con i posts
Route::get('posts', 'PostController@index')->name('posts');

// route accesso libero con il singolo posts
Route::get('post/{id}', 'PostController@show')->name('post');

//routes accesso privato
Route::prefix('admin')
    ->namespace('Admin')
    ->name('admin.')
    ->middleware('auth')
    ->group(function () {
        Route::resource('posts', 'PostController');
});
