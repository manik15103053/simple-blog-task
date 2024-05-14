<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserDashboardController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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


Route::get('/',[FrontendController::class,'index'])->name('frontend.index');

//Registration
Route::get('/register',[AuthController::class,'register'])->name('register');
Route::post('/register-submit',[AuthController::class,'regisSub'])->name('register.submit');
Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/check',[AuthController::class,'check'])->name('check.login');


Route::middleware(['auth:web'])->group(function(){
    Route::get('/dashboard',[UserDashboardController::class,'dashboard'])->name('dashboard');
    Route::post('/logout', [AuthController::class,'logout'])->name('logout');
});
