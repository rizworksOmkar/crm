<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Country;
use App\Models\Admin\State;
use App\Models\Admin\City;
use App\Http\Controllers\Admin\AdminlinkcreateController;
use App\Http\Controllers\Admin\DataStoreController;
use App\Http\Controllers\Admin\MasterDataController;
use App\Http\Controllers\Admin\PackageSeasonController;
use App\Http\Controllers\Admin\RuleEngineController;
use App\Http\Controllers\Admin\HotelController;
//pay controller
use App\Http\Controllers\PhonepayController;



Route::group(['middleware' => ['disabled_back_button']], function () {
    Route::group(['middleware' => ['SuperAdmin']], function () {
        Route::get('/Superadmin-landing-page', [AdminlinkcreateController::class, 'superadminDashboard'])->name('SuperAdmin-dashboard');        
    });
    
});
