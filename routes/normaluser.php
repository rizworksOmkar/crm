<?php

use App\Http\Controllers\CRM\LeadController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CRM\UserController;
use App\Http\Controllers\CRM\UserMenuLinkController;


Route::group(['middleware' => ['disabled_back_button']], function () {

    Route::group(['middleware' => ['User']], function () {

        Route::get('/user-dashboard', [UserMenuLinkController::class, 'userDashboard'])->name('User-dashboard');

        Route::get('/myLeads', [LeadController::class, 'empLeadIndex'])->name('my-lead-index');

        Route::get('/myleads/{id}/edit', [LeadController::class, 'changeStatus'])->name('leads.changeStatus');
        Route::put('/myleads/{id}', [LeadController::class, 'updateStatus'])->name('leads.updateStatus');

        //make a get route to fetch task of each lead - work for anish da resources are in resources/admin/..../emptask etc. you will know

        Route::post('leads/{lead}/tasks', [LeadController::class, 'storeTask'])->name('leads.tasks.store');
        Route::patch('leads/{lead}/tasks/{task}', [LeadController::class, 'updateTask'])->name('leads.tasks.update');
        
    });
});
