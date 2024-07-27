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
Route::get('/about',[\App\Http\Controllers\Frontend\AboutController::class, 'index'])->name('about.page');
Route::get('/post',[\App\Http\Controllers\Frontend\PostController::class, 'index'])->name('post.page');
Route::post('/appoinment',[\App\Http\Controllers\Frontend\FrontendController::class, 'appoinment'])->name('appoinment.post');

Route::get('/login',[\App\Http\Controllers\auth\LoginController::class ,'showLoginForm'])->name('login.form'); 
Route::post('/login',[\App\Http\Controllers\auth\LoginController::class ,'loginUser'])->name('auth.login');

Route::middleware('admin')->prefix('admin')->group(function () {  

    Route::get('/slider/index',[\App\Http\Controllers\Admin\SliderController::class,'index'])->name('slider.index');
    Route::get('/experience',[\App\Http\Controllers\Admin\AdminAboutController::class,'about'])->name('aboutexp.about'); 
    Route::get('/appointment/details/users',App\Livewire\Admin\Appointment\Index::class)->name('appoinment.users');
    Route::get('/post/index',[\App\Http\Controllers\Admin\PostAdminController::class,'index'])->name('post.index'); 

    Route::get('/about/index',[\App\Http\Controllers\Admin\AboutController::class,'index'])->name('about.index');
    Route::get('/about/create',[\App\Http\Controllers\Admin\AboutController::class,'create'])->name('about.create');
    Route::post('/about/store',[\App\Http\Controllers\Admin\AboutController::class,'store'])->name('about.store');
    Route::get('/about/edit/{id}',[\App\Http\Controllers\Admin\AboutController::class,'edit'])->name('about.edit');
    Route::post('/about/update/{id}',[\App\Http\Controllers\Admin\AboutController::class,'update'])->name('about.update'); 

    Route::get('/profile',[\App\Http\Controllers\Admin\ProfileController::class,'create'])->name('profile.create');

    Route::get('/dashboard', function () {
    return view('admin.hello');
})->name('admin.dashboard'); 
});
