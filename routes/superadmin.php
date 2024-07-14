<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Country;
use App\Models\Admin\State;
use App\Models\Admin\City;
use App\Http\Controllers\CRM\LinkController;
use App\Http\Controllers\CRM\LeadController;


Route::group(['middleware' => ['disabled_back_button']], function () {
    Route::group(['middleware' => ['SuperAdmin']], function () {
        Route::get('/Superadmin-landing-page', [LinkController::class, 'superadminDashboard'])->name('SuperAdmin-dashboard');        
    });
    
});
