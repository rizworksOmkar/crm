<?php

use App\Http\Controllers\CRM\LeadController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CRM\UserController;
use App\Http\Controllers\CRM\UserMenuLinkController;
use App\Http\Controllers\CRM\TaskController;

use App\Http\Controllers\CRM\LinkController;
use App\Http\Controllers\CRM\EmployeeController;
use App\Http\Controllers\CRM\AssignLeadController;
use App\Http\Controllers\CRM\LeadImportController;
use App\Http\Controllers\BillingController;

use App\Http\Controllers\Admin\AdminlinkcreateController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PropertyTypeController;
use App\Http\Controllers\PropertySpecController;
use App\Http\Controllers\LeadSourceController;
use App\Http\Controllers\LeadStatusController;
use App\Http\Controllers\ReportController;

use App\Http\Controllers\CRM\EntityStatusController;

use App\Models\Lead;
use League\CommonMark\Extension\CommonMark\Node\Inline\Link;


Route::group(['middleware' => ['disabled_back_button']], function () {

    Route::group(['middleware' => ['User']], function () {

        Route::get('/user-dashboard', [UserMenuLinkController::class, 'userDashboard'])->name('User-dashboard');

        Route::get('/myLeads', [LeadController::class, 'empLeadIndex'])->name('my-lead-index');

        Route::get('/myleads/{id}/edit', [LeadController::class, 'changeStatus'])->name('leads.changeStatus');
        Route::put('/myleads/{id}', [LeadController::class, 'updateStatus'])->name('leads.updateStatus');

        Route::get('/myTasks/{id}', [LeadController::class, 'showTask'])->name('view.showTasks');
        Route::get('/addMyTasks/{id}', [LeadController::class, 'addTask'])->name('view.addTasks');

        Route::post('leads/{lead}/tasks', [LeadController::class, 'storeleadTask'])->name('leads.tasks.store');
        Route::patch('leads/{lead}/tasks/{task}', [LeadController::class, 'updateLeadTask'])->name('leads.tasks.update');
        Route::get('/get-contact-phone/{id}', [LeadController::class, 'getContactPhone']);
        Route::get('/get-lead-info/{id}', [LeadController::class, 'getLeadInfo']);

        // Route::get('/leads/{id}/details', [LeadController::class, 'getDetails'])->name('leads.details');
        // Route::get('/leads/{id}/timeline', [LeadController::class, 'timeline'])->name('leads.timeline');
        // // storeTaskByEmployee
        // Route::post('/tasks', [LeadController::class, 'storeTaskByEmployee'])->name('tasks.store');


        Route::get('/main-lead-report-user', [ReportController::class, 'leadReport'])->name('lead-report-main-user');
        Route::get('/leads/{id}/detail', [ReportController::class, 'getDetailsOfLeads'])->name('leads.details');
        Route::get('/leads/{id}/timelines', [ReportController::class, 'timelineOfActivity'])->name('leads.timeline');

        Route::post('/tasks', [LeadController::class, 'storeTaskByEmployee'])->name('tasks.store');

        //billing report
        Route::get('/unbilled-leads-user', [ReportController::class, 'getUnbilledLeads'])->name('unbilled-leadsuser');
        Route::get('/billed-leads-user', [ReportController::class, 'getBilledLeads'])->name('billed-leadsuser');
        Route::get('/paid-leads-user', [ReportController::class, 'getPaidLeads'])->name('paid-leadsuser');
        // Route::get('/customer-user', [AdminlinkcreateController::class, 'customerIndex'])->name('admin.customer.index');
        // Route::get('customercreate', [AdminlinkcreateController::class, 'customerCreate'])->name('admin.customer.create');

        Route::get('/date-range-report-user', [LeadController::class, 'dateRangeReport'])->name('date-range-reportuser');
        Route::get('/get-tasks-by-date-range/{startDate}/{endDate}', [LeadController::class, 'getTasksByDateRange']);
        Route::get('/get-leads-by-date-range/{startDate}/{endDate}', [LeadController::class, 'getLeadsByDateRange']);

        Route::post('/leadstatuschange/{id}/toggle-status', [EntityStatusController::class, 'toggleleadStatuschange']);
        Route::post('/leadsourcechange/{id}/toggle-status', [EntityStatusController::class, 'toggleleadSourcechange']);
        Route::post('/propertytypestatusechange/{id}/toggle-status', [EntityStatusController::class, 'toggleProptypeStatuschange']);
        Route::post('/propspecstatuschange/{id}/toggle-status', [EntityStatusController::class, 'togglePropSpecStatuschange']);
        Route::post('/rolestatuschange/{id}/toggle-status', [EntityStatusController::class, 'toggleRoleStatuschange']);

        Route::get('/leads/{id}/details', [LeadController::class, 'getDetails'])->name('leads.details');
        Route::get('/leads/{id}/timeline', [LeadController::class, 'timeline'])->name('leads.timeline');
        // storeTaskByEmployee
        Route::post('/emptasks', [LeadController::class, 'storeTaskByEmployee'])->name('tasks.store');

        Route::get('/notification/employee', [ReportController::class, 'notificationTasksEmployee'])->name('emp.tasks.notification');
        Route::post('/employee/notifcation/filter', [ReportController::class, 'filterNotificationTasksOfEmployee'])->name('tasks.emp.notification.filter');
    });
});
