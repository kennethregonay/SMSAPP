<?php

use App\Models\User;
use App\Models\Learner;
use App\Models\Announcement;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BrigadaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MasterlistController;
use App\Http\Controllers\SectioningController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\RegistrationListController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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


//  Dashboard View Functionalities
Route::get('dashboard', function(){
    $user = User::all();
    $announcement = Announcement::all();
    $learners = Learner::all();
    
    return view('dashboard', [
        'users' => $user,
        'announcements' => $announcement,
        'learners' => $learners,
    ]);
});

// User View Functionalities
Route::get('/', [UserController::class, 'initialize']);
Route::post('principal/create', [UserController::class, 'adminCreation']);
Route::post('user/create', [UserController::class, 'create']);
Route::post('user/login', [UserController::class, 'login'])->name('login');
Route::get('user/logout', [UserController::class, 'logout']);

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
Route::get('noticeboard',[AnnouncementController::class, 'index'] );
Route::post('noticeboard/create', [AnnouncementController::class, 'create']);
Route::post('noticeboard/delete', [AnnouncementController::class, 'delete']);
Route::post('noticeboard/update', [AnnouncementController::class, 'update']);

// Sectioning Functionalities

Route::get('section', [SectioningController::class,'index']);

// Route::get('section',[SectioningController::class, 'index'] );
// Route::post('section/create',[SectioningController::class, 'create'] );
// Route::post('section/update',[SectioningController::class, 'update'] );
// Route::post('section/delete',[SectioningController::class, 'delete'] );
// Route::get('section/learners',[SectioningController::class, 'sectionLearners'] );

// Masterlist View Functionalities
Route::get('masterlist',[MasterlistController::class, 'index']);

// Register List Management View Functionalities
Route::get('registrationManage',[RegistrationListController::class, 'index']);
Route::post('registration/accept',[RegistrationListController::class, 'approveLearners']);
Route::post('registration/decline',[RegistrationListController::class, 'declineLearners']);

