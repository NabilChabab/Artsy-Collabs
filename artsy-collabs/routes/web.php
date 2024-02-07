<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArtProjectController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PartnersController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::resource('home', HomeController::class);
Route::resource('users', UserController::class);


//admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('dashboard', AdminController::class);
    Route::resource('projects', ArtProjectController::class);
    Route::resource('partners', PartnersController::class);
    
});


Route::get('logout', [LoginController::class, 'logout']);
