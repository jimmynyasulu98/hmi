<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserContorller;
use App\Http\Controllers\Member\MemberContorller;
use App\Http\Controllers\member\PasswordContorller;


Route::get('/', function () {
    return view('welcome');
});

// User routes 
Route::get('login',[UserContorller::class,'login'])->name('login');
Route::get('register',[UserContorller::class,'register'])->name('register');

// Member routes
Route::middleware('member')->name('member_')->group(function(){
    Route::get('/member',[MemberContorller::class,'dashboard'])->name('dashboard');
    Route::post('/logout',[MemberContorller::class,'logout'])->name('logout');
});

Route::middleware('staff')->name('staff_')->group(function(){
    Route::get('/staff',[UserContorller::class,'dashboard'])->name('dashboard');
    Route::post('/logout',[App\Http\Controllers\User\SessionContorller::class,'logout'])->name('logout');
});


Route::prefix('staff')->name('staff_')->group(function(){
    Route::get('/login',[App\Http\Controllers\User\SessionContorller::class,'login'])->name('login');
    Route::post('/authenticate',[App\Http\Controllers\User\SessionContorller::class,'authenticate'])->name('authenticate');
    Route::get('/forgot-password',[PasswordContorller::class,'forgot_password_view'])->name('forgot_password');
    Route::post('/forgot-password',[PasswordContorller::class,'forgot_password'])->name('forgot_password');
    Route::get('/reset-password/{token}/{email}',[PasswordContorller::class,'reset_password_view'])->name('reset_password');
    Route::post('/reset-password/{token}/{email}',[PasswordContorller::class,'reset_password'])->name('reset_password');
    Route::get('/register',[MemberContorller::class,'register'])->name('register');
    
});

Route::prefix('member')->name('member_')->group(function(){
    Route::get('/login',[MemberContorller::class,'login'])->name('login');
    Route::post('/authenticate',[MemberContorller::class,'authenticate'])->name('authenticate');
    Route::get('/forgot-password',[PasswordContorller::class,'forgot_password_view'])->name('forgot_password');
    Route::post('/forgot-password',[PasswordContorller::class,'forgot_password'])->name('forgot_password');
    Route::get('/reset-password/{token}/{email}',[PasswordContorller::class,'reset_password_view'])->name('reset_password');
    Route::post('/reset-password/{token}/{email}',[PasswordContorller::class,'reset_password'])->name('reset_password');
    Route::get('/register',[MemberContorller::class,'register'])->name('register');
    
});
