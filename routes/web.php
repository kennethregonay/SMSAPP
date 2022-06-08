<?php

use App\Http\Controllers\BrigadaController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes{{  }}
|--------------------------------------------------------------------------
|{{  }}
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
Route::get('/noticeboard', function(){
    return view ('noticeboard');
});
Route::get('/registerformlist', function(){
    return view ('registerformlist');
});
Route::get('/masterlist', function(){
    return view ('masterlist');
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
Route::get('/', [UserController::class, 'initialize']);
Route::post('user/create', [UserController::class, 'create']);
Route::post('user/login', [UserController::class, 'login'])->name('login');
Route::post('user/logout', [UserController::class, 'logout']);

// Registration Functionalities
Route::get('registration', [RegisterController::class,'index']);
Route::post('register/verify', [RegisterController::class, 'register'])->name('register');
Route::post('confirmation', [RegisterController::class, 'confirmation']);



// Accounts Functionalities{
Route::get('account', [UserController::class, 'showAccount']);
Route::post('account/update', [UserController::class, 'update']);

// Request Functionalities
Route::get('request', [UserController::class, 'showRequest']);
Route::post('request/approve', [UserController::class, 'ApproveRequest']);
Route::post('request/delete', [UserController::class, 'DeleteRequest']);

//Brigada Functionalities
Route::get('brigada', [BrigadaController::class, 'index']);
Route::post('brigada/create', [BrigadaController::class, 'create']);
Route::post('brigada/delete', [BrigadaController::class, 'delete']);
Route::post('brigada/update', [BrigadaController::class, 'update']);

// Announcement Functionalities
Route::get('noticeboard', [AnnouncementController::class, 'index']);
// Route::post('noticeboard/create', [AnnouncementController::class, 'create']);
// Route::post('noticeboard/delete', [AnnouncementController::class, 'delete']);
// Route::post('noticeboard/update', [AnnouncementController::class, 'update']);