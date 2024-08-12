<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserContorller;
use App\Http\Controllers\Member\MemberContorller;

Route::get('/', function () {
    return view('welcome');
});

// User routes 
Route::get('login',[UserContorller::class,'login'])->name('login');
Route::get('register',[UserContorller::class,'register'])->name('register');

// Member routes
Route::middleware('member')->group(function(){
    Route::get('/member',[MemberContorller::class,'dashboard'])->name('dashboard');
});

Route::prefix('member')->name('member_')->group(function(){
    Route::get('/login',[MemberContorller::class,'login'])->name('login');
    Route::post('/authenticate',[MemberContorller::class,'authenticate'])->name('authenticate');
    Route::get('/logout',[MemberContorller::class,'logout'])->name('logout');
    Route::get('/register',[MemberContorller::class,'register'])->name('register');
    
});
