<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes{{  }}
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function(){
    return view ('index');
});
Route::get('/dashboard', function(){
    return view ('dashboard');
});
Route::get('/section', function(){
    return view ('section');
});
Route::get('/registration', function(){
    return view ('registration');
});
// for testing purposes onlu
Route::get('test', function(){
    return view ('x');
});

// Functionality for User Controller
Route::post('user/create', [UserController::class, 'create']);
Route::post('user/login', [UserController::class, 'login'])->name('login');

Route::post('user/logout', [UserController::class, 'logout']);

// Registration Functionalities
Route::get('registration', [RegisterController::class,'index']);
Route::post('register/verify', [RegisterController::class, 'register'])->name('register');
Route::post('confirmation', [RegisterController::class, 'confirmation']);



// Accounts Functionalities