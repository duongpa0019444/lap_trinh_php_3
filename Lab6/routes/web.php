<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuanTriTinController;
use App\Http\Middleware\Quantri;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('download', function(){ return view("download"); });
    Route::get('quantritin',[QuanTriTinController::class, 'index']);
});

Route::get('quantri',function(){
    return view('quantri');
})->middleware(Quantri::class);

Route::get('dl', function(){ return view("download"); })->middleware('auth.basic');


require __DIR__.'/auth.php';
