<?php

use App\Http\Controllers\EmailController;
use App\Http\Controllers\Tincontroller;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthAdmin;
Route::get('/', [Tincontroller::class,'index'])->name('home');
Route::get('/news/category/{id}', [Tincontroller::class,'newsCate'])->name('newsCate');
Route::get('/news/{id}', [Tincontroller::class,'newsDetail'])->name('newsDetail');
Route::post('/news/search', [Tincontroller::class,'newsSearch'])->name('news.search');
Route::post('/login', [UserController::class,'login'])->name('user.login');
Route::post('/register', [UserController::class,'register'])->name('user.register');
Route::get('/logout', [UserController::class,'logout'])->name('logout');
Route::post('/sendemail', [EmailController::class,'sendEmail'])->name('user.send');
//hiển thị trang reset
Route::get('reset-password/{token}',[EmailController::class,'formResset'])->name('password.reset');
//cập nhật mật khẩu
Route::post('reset-password', [EmailController::class,'ressetPass'])->name('password.update');
//kích hoạt tài khoản
Route::get('/verify/{token}', [UserController::class, 'verifyUser'])->name('user.verify');

Route::middleware(['auth'])->group(function () {
    Route::get('/myaccount', [UserController::class,'myaccount'])->name('user.account');
});


Route::middleware(['auth', AuthAdmin::class])->group(function() {
    Route::get('/admin/dashboard', [UserController::class,'dashboard'])->name('admin.dashboard');
    Route::get('/admin/news/list', [Tincontroller::class,'newsList'])->name('admin.newsList');
    Route::get('/admin/news/create', [Tincontroller::class,'newsCreate'])->name('admin.newsCreate');
    Route::post('/admin/news/store', [Tincontroller::class,'newsStore'])->name('admin.newsStore');
    Route::delete('/admin/news/delete', [Tincontroller::class,'newsDelete'])->name('admin.delete');


    Route::get('/admin/logoutAdmin', [UserController::class,'logoutAdmin'])->name('admin.logout');


});
