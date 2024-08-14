<?php

use App\Http\Controllers\Staff\PasswordController as StaffPasswordController;
use App\Http\Controllers\Staff\SessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Staff\StaffController;
use App\Http\Controllers\Member\MemberController;
use App\Http\Controllers\member\PasswordController as MemberPasswordController;


Route::get('/', function () {
    return view('welcome');
});
// Member routes
Route::middleware('member')->name('member_')->group(function(){
    Route::get('/member',[MemberController::class,'dashboard'])->name('dashboard');
    Route::post('/logout',[MemberController::class,'logout'])->name('logout');
});

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

Route::prefix('member')->name('member_')->group(function(){
    Route::get('/login',[MemberController::class,'login'])->name('login');
    Route::post('/authenticate',[MemberController::class,'authenticate'])->name('authenticate');
    Route::get('/forgot-password',[MemberPasswordController::class,'forgot_password_view'])->name('forgot_password');
    Route::post('/forgot-password',[MemberPasswordController::class,'forgot_password'])->name('forgot_password');
    Route::get('/reset-password/{token}/{email}',[MemberPasswordController::class,'reset_password_view'])->name('reset_password');
    Route::post('/reset-password/{token}/{email}',[MemberPasswordController::class,'reset_password'])->name('reset_password');
    Route::get('/register',[MemberController::class,'register'])->name('register');
    
});
