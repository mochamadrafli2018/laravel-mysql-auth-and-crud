<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\UserDataController;

// New User Register (Sign Up Admin or User)
Route::post('/register', [AuthController::class,'signUp']);
// User Authentication (Sign In Admin or User)
Route::post('/login','AuthController@signIn');
// User Authorization to Dashboard (JWT Token Verification)
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Retrieve all user data
Route::get('/user/all', [UserDataController::class,'getAllUser']);
// Get user data data by id
Route::get('/user/{id}', [UserDataController::class,'findById']);
// Edit User Data (Admin and User)
Route::put('/user/{id}','UserDataController@editUserData');
// Delete User Data (Admin Only)
Route::delete('/user/{id}','UserDataController@deleteUserData');

// Get All Data
Route::get('/data','api\DataController@getAll');
// Create New Data
Route::post('/data','api\DataController@createNewData');
// Get Data By Id
Route::get('/data/{id}','api\DataController@findById');
// Edit Data
Route::put('/data/{id}','api\DataController@findandUpdateById');
// Delete Data'
Route::delete('/data/{id}','api\DataController@findandRemoveById');