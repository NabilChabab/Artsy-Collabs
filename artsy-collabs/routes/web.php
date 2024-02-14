<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\ArtProjectController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\partner\PartnersController;
use App\Http\Controllers\artist\ProfileController;
use App\Http\Controllers\admin\RequestController;
use App\Http\Controllers\admin\UpdateStatusController;
use App\Http\Controllers\artist\UserController;
use App\Http\Controllers\artist\UserProjectController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// start app
Route::get('/', [HomeController::class,'index'])->name('home');
//auth
Auth::routes();
//home page
Route::resource('home', HomeController::class);
//artists
Route::resource('users', UserController::class);
Route::resource('Profile', ProfileController::class);
Route::post('userRequest', [RequestController::class , 'sendRequest'])->name('userRequest');


//admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('dashboard', AdminController::class);
    Route::put('projects/{project}/restore', [ArtProjectController::class, 'restore'])->name('projects.restore');
    Route::resource('projects', ArtProjectController::class);
    Route::resource('projectss', UpdateStatusController::class);
    Route::resource('partners', PartnersController::class);
    Route::resource('userproject', UserProjectController::class);
    
});


Route::get('logout', [LoginController::class, 'logout']);
