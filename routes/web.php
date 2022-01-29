<?php

use Illuminate\Support\Facades\Route;
use App\Posts;
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

// return file from index\welcome.blade.php
Route::get('/', function () {
    return view('posts.welcome');
});
// return file from layout\navbar.blade.php
Route::get('/nav', function () {
    return view('layout.navbar');
});

// Route::resource('/post','PostsController@index');
// Route::get('/post','PostsController@index');