<?php

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

Route::get('/', function () {
    return view('welcome');
}); 
Route::get('/login',[\App\Http\Controllers\auth\LoginController::class ,'showLoginForm'])->name('login.form'); 
Route::post('/login',[\App\Http\Controllers\auth\LoginController::class ,'loginUser'])->name('auth.login');

Route::middleware('admin')->prefix('admin')->group(function () {  

    Route::get('/slider/index',[\App\Http\Controllers\Admin\SliderController::class,'index'])->name('slider.index');


    Route::get('/admin', function () {
    return view('admin.hello');
})->name('admin.dashboard'); 
});
