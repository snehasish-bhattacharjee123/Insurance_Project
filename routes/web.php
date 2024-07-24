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

Route::get('/',[\App\Http\Controllers\Frontend\FrontendController::class, 'index'])->name('first.page');
Route::get('/about',[\App\Http\Controllers\Frontend\FrontendController::class, 'about'])->name('about.page');
Route::post('/appoinment',[\App\Http\Controllers\Frontend\FrontendController::class, 'appoinment'])->name('appoinment.post');

Route::get('/login',[\App\Http\Controllers\auth\LoginController::class ,'showLoginForm'])->name('login.form'); 
Route::post('/login',[\App\Http\Controllers\auth\LoginController::class ,'loginUser'])->name('auth.login');

Route::middleware('admin')->prefix('admin')->group(function () {  

    Route::get('/slider/index',[\App\Http\Controllers\Admin\SliderController::class,'index'])->name('slider.index');
    Route::get('/experience',[\App\Http\Controllers\Admin\AdminAboutController::class,'about'])->name('aboutexp.about'); 
    Route::get('/appointment/details/users',App\Livewire\Admin\Appointment\Index::class)->name('appoinment.users'); 

    Route::get('/about/index',[\App\Http\Controllers\Admin\AboutController::class,'index'])->name('about.index');
    Route::get('/about/create',[\App\Http\Controllers\Admin\AboutController::class,'create'])->name('about.create');
    Route::post('/about/store',[\App\Http\Controllers\Admin\AboutController::class,'store'])->name('about.store');

    Route::get('/admin', function () {
    return view('admin.hello');
})->name('admin.dashboard'); 
});
