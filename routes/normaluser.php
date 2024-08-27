<?php

use App\Http\Controllers\CRM\LeadController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CRM\UserController;
use App\Http\Controllers\CRM\UserMenuLinkController;
use App\Http\Controllers\CRM\TaskController;


Route::group(['middleware' => ['disabled_back_button']], function () {

    Route::group(['middleware' => ['User']], function () {

        Route::get('/user-dashboard', [UserMenuLinkController::class, 'userDashboard'])->name('User-dashboard');

        Route::get('/myLeads', [LeadController::class, 'empLeadIndex'])->name('my-lead-index');
        //my closed leads
        Route::get('/myClosedLeads', [LeadController::class, 'empClosedLeadIndex'])->name('my-closed-lead-index');

        Route::get('/myleads/{id}/edit', [LeadController::class, 'changeStatus'])->name('leads.changeStatus');
        Route::put('/myleads/{id}', [LeadController::class, 'updateStatus'])->name('leads.updateStatus');

        Route::get('/myTasks/{id}', [LeadController::class, 'showTask'])->name('view.showTasks');
        Route::get('/addMyTasks/{id}', [LeadController::class, 'addTask'])->name('view.addTasks');

        Route::post('leads/{lead}/tasks', [LeadController::class, 'storeleadTask'])->name('leads.tasks.store');
        Route::patch('leads/{lead}/tasks/{task}', [LeadController::class, 'updateLeadTask'])->name('leads.tasks.update');
        Route::get('/get-contact-phone/{id}', [LeadController::class, 'getContactPhone']);
        Route::get('/get-lead-info/{id}', [LeadController::class, 'getLeadInfo']);

        Route::get('/leads/{id}/details', [LeadController::class, 'getDetails'])->name('leads.details');
        Route::get('/leads/{id}/timeline', [LeadController::class, 'timeline'])->name('leads.timeline');
        // storeTaskByEmployee
        Route::post('/emptasks', [LeadController::class, 'storeTaskByEmployee'])->name('tasks.store');
    });
});
