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
//  1st changes 
// 2nd changes 

Route::get('/',[\App\Http\Controllers\Frontend\FrontendController::class, 'index'])->name('first.page');
Route::get('/about',[\App\Http\Controllers\Frontend\AboutController::class, 'index'])->name('about.page');
Route::get('/service',[\App\Http\Controllers\Frontend\ServiceController::class, 'index'])->name('service.page');
Route::get('/post',[\App\Http\Controllers\Frontend\PostController::class, 'index'])->name('post.page');
Route::get('/contact-us',[\App\Http\Controllers\Frontend\ContactController::class, 'index'])->name('contact.page');
Route::post('/appoinment',[\App\Http\Controllers\Frontend\FrontendController::class, 'appoinment'])->name('appoinment.post');
Route::get('/{service}/product',[\App\Http\Controllers\Frontend\ProductController::class, 'index'])->name('product.page');

Route::get('/login',[\App\Http\Controllers\auth\LoginController::class ,'showLoginForm'])->name('login.form'); 
Route::post('/login',[\App\Http\Controllers\auth\LoginController::class ,'loginUser'])->name('auth.login');
Route::post('/logout',[\App\Http\Controllers\auth\LoginController::class ,'logout'])->name('logout'); 

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
    Route::post('/profile/store',[\App\Http\Controllers\Admin\ProfileController::class,'store'])->name('profile.store');
    Route::post('/profile/image/store',[\App\Http\Controllers\Admin\ProfileController::class,'image_store'])->name('profile.image.store');
    Route::post('/profile/password/update',[\App\Http\Controllers\Admin\ProfileController::class,'password_update'])->name('profile.password.update'); 

    Route::get('/service/index',[\App\Http\Controllers\Admin\ServiceController::class,'index'])->name('service.index');
    Route::get('/service/create',[\App\Http\Controllers\Admin\ServiceController::class,'create'])->name('service.create');
    Route::post('/service/store',[\App\Http\Controllers\Admin\ServiceController::class,'store'])->name('service.store');
    Route::get('/service/edit/{id}',[\App\Http\Controllers\Admin\ServiceController::class,'edit'])->name('service.edit');
    Route::post('/service/update/{id}',[\App\Http\Controllers\Admin\ServiceController::class,'update'])->name('service.update'); 
    
    Route::get('/product/index',[\App\Http\Controllers\Admin\ProductController::class,'index'])->name('product.index');
    Route::get('/product/create',[\App\Http\Controllers\Admin\ProductController::class,'create'])->name('product.create');
    Route::post('/product/store',[\App\Http\Controllers\Admin\ProductController::class,'store'])->name('product.store');
    Route::get('/product/edit/{id}',[\App\Http\Controllers\Admin\ProductController::class,'edit'])->name('product.edit');
    Route::post('/product/{id}/update',[\App\Http\Controllers\Admin\ProductController::class,'update'])->name('product.update');
});
