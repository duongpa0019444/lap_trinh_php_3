<?php

use App\Http\Controllers\TinController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/tin/ds', [TinController::class, 'index'])->name('tin.list');

Route::get('/tin/them', [TinController::class, 'them'])->name('tin.them');
Route::post('/tin/them', [TinController::class, 'store'])->name('tin.store');

Route::get('/tin/{id}/edit', [TinController::class, 'edit'])->name('tin.edit');
Route::put('/tin/update', [TinController::class, 'update'])->name('tin.update');

Route::DELETE('/tin/delete', [TinController::class, 'delete'])->name('tin.delete');


