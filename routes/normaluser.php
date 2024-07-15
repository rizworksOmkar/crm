<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CRM\UserController;
use App\Http\Controllers\CRM\UserMenuLinkController;


Route::group(['middleware' => ['disabled_back_button']], function () {

    Route::group(['middleware' => ['User']], function () {       

        Route::get('/user-dashboard', [UserMenuLinkController::class, 'userDashboard'])->name('User-dashboard');
       
    });
});
