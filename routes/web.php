<?php

use App\Helpers\Routes\RouteHelper;
use App\Http\Controllers\Claim\UserClaimController;
use Illuminate\Support\Facades\Route;




Route::inertia('/','Home', ['user'=>'User1'])->name('home');
Route::inertia('/claim/new','Claim/NewClaim')->name('new_claim');
Route::get('/member/find-user',[UserClaimController::class , 'find_user'])->name('find_user_claim');
Route::post('/claim/new',[UserClaimController::class , 'new_claim']);
Route::get('/member/{member}/claim/new',[UserClaimController::class , 'new_claim_form']);

RouteHelper::routeFiles( __DIR__ . '/web');



