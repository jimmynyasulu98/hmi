<?php

use App\Http\Controllers\Staff\PasswordController as StaffPasswordController;
use App\Http\Controllers\Staff\SessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Staff\StaffController;

Route::middleware('staff')->name('staff_')->group(function(){
    Route::get('/staff',[StaffController::class,'dashboard'])->name('dashboard');
    Route::post('/logout',[SessionController::class,'logout'])->name('logout');
});


Route::prefix('staff')->name('staff_')->group(function(){
    Route::get('/login',[SessionController::class,'login'])->name('login');
    Route::post('/authenticate',[SessionController::class,'authenticate'])->name('authenticate');
    Route::get('/forgot-password',[StaffPasswordController::class,'forgot_password_view'])->name('forgot_password');
    Route::post('/forgot-password',[StaffPasswordController::class,'forgot_password'])->name('forgot_password');
    Route::get('/reset-password/{token}/{email}',[StaffPasswordController::class,'reset_password_view'])->name('reset_password');
    Route::post('/reset-password/{token}/{email}',[StaffPasswordController::class,'reset_password'])->name('reset_password');
 
});
