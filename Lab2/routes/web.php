<?php

use App\Http\Controllers\duongController;
use App\Http\Controllers\Tincontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', [Tincontroller::class,'index'])->name('home');
Route::get('/news/category/{id}', [Tincontroller::class,'newsCate'])->name('newsCate');
Route::get('/news/{id}', [Tincontroller::class,'newsDetail'])->name('newsDetail');

