<?php

use App\Http\Controllers\hocsinhController;
use App\Http\Controllers\sinhvienController;
use App\Mail\VerifyMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');



Route::get("hs",[hocsinhController::class,'hs'])->name('hs');
Route::post("hs",[hocsinhController::class,'hs_store'])->name('hs_store');


Route::get("sv",[sinhvienController::class,'sv'])->name('sv');
Route::post("sv",[sinhvienController::class,'sv_store'])->name('sv_store');
Route::get("guiMail",function(){
    if (!session()->has('mail_sent')) {
        Mail::to('duongdtpa00194@gmail.com')->send(new VerifyMail());
        session()->put('mail_sent', true);
    }
    return redirect()->route('home');
})->name('guiMail');

