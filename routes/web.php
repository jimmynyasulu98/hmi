<?php

use App\Helpers\Routes\RouteHelper;
use App\Http\Controllers\Claim\ServiceProviderClaimController;
use Illuminate\Support\Facades\Route;




Route::inertia('/','Home', ['user'=>'User1'])->name('home');

Route::inertia('/claim/new','Claim/NewClaim')->name('new_claim');
Route::get('/service-provider/claims',[ServiceProviderClaimController::class , 'index'])->name('service_provider_claims');
Route::get('/member/find-user',[ServiceProviderClaimController::class , 'find_user'])->name('find_user_claim');
Route::post('/claim/new',[ServiceProviderClaimController::class , 'new_claim']);
Route::post('/member/{member}/claim/new',[ServiceProviderClaimController::class , 'new_claim_form']);
Route::get('/service-provider/claim/{claim}',[ServiceProviderClaimController::class , 'show']);


RouteHelper::routeFiles( __DIR__ . '/web');



