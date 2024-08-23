<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Country;
use App\Models\Admin\State;
use App\Models\Admin\City;
use App\Http\Controllers\CRM\LinkController;
use App\Http\Controllers\CRM\LeadController;
use App\Http\Controllers\CRM\EmployeeController;
use App\Http\Controllers\CRM\AssignLeadController;
use App\Http\Controllers\CRM\LeadImportController;
use App\Http\Controllers\BillingController;


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

    Route::group(['middleware' => ['Admin']], function () {

        Route::get('/landing-page', [LinkController::class, 'adminDashboard'])->name('Admin-dashboard');
        Route::get('/employee', [LinkController::class, 'employeeindex'])->name('admin-employee-index');
        Route::get('/createEmployee', [LinkController::class, 'createEmployee'])->name('admin-create-employee');
        Route::post('/storeEmployee', [EmployeeController::class, 'storeEmployee'])->name('admin-employee-store');
        Route::post('/deletEmployee', [EmployeeController::class, 'deleteEmployee'])->name('admin-employee-delete');
        Route::get('/check-username/{username}', [EmployeeController::class, 'checkUsernameAvailability']);

        //lead
        Route::get('/lead-upload-form', [LeadController::class, 'showUploadForm'])->name('lead.upload');
        Route::post('/lead-preview', [LeadController::class, 'preview'])->name('lead.preview');
        Route::post('/lead-iimport', [LeadController::class, 'imports'])->name('lead-imports');

        Route::get('/get-contact-details/{id}', [LeadController::class, 'getContactDetails']);
        Route::get('/leads', [LeadController::class, 'leadIndex'])->name('admin-lead-index');
        Route::get('/createLead', [LeadController::class, 'createLead'])->name('admin-create-lead');
        Route::post('/storeLead', [LeadController::class, 'storeLead'])->name('admin-lead-store');
        Route::delete('/leads/{id}', [LeadController::class, 'deleteLead'])->name('leads.delete');
        Route::get('/leads/{id}/edit', [LeadController::class, 'editLead'])->name('leads.edit');
        Route::put('/leads/{id}', [LeadController::class, 'updateLead'])->name('leads.update');

        Route::get('/myEmpTasks/{id}', [LeadController::class, 'showEmpTask'])->name('view.showEmpTasks');

        // admin-contact-store
        Route::post('/contactStore', [LeadController::class, 'storeContact'])->name('admin-contact-store');

        Route::get('/assignLeads', [AssignLeadController::class, 'assignLeadsIndex'])->name('admin-assignlead-index');
        Route::post('/assign-leads', [AssignLeadController::class, 'assignLeadsToEmployee'])->name('assign-leads');

        Route::get('/reassignLeads', [AssignLeadController::class, 'reassignLeadsIndex'])->name('admin-reassignlead-index');
        Route::get('/get-assigned-leads/{employeeId}', [AssignLeadController::class, 'getAssignedLeads'])->name('get-assigned-leads');
        Route::post('/reassign-leads', [AssignLeadController::class, 'reassignLeads'])->name('reassign-leads');

        //reports employeeReportIndex
        Route::get('/employee/monitoring', [LeadController::class, 'employeeReportIndex'])->name('admin-employee-monitor');
        //roles

        //status
        Route::get('/status', [LeadController::class, 'getStatus'])->name('get-all-status');
        Route::get('/status/create', [LeadController::class, 'createStatus'])->name('admin-create-status');
        //source
        Route::get('/sources', [LeadController::class, 'getSource'])->name('get-all-sources');
        Route::get('/source/create', [LeadController::class, 'createSources'])->name('admin-create-source');

        //report
        Route::get('/emp-report', [EmployeeController::class, 'getLeadReport'])->name('emp-report');
        Route::get('/lead-report', [EmployeeController::class, 'getEmpReport'])->name('lead-report');

        Route::get('/get-employee-lead-details/{employeeId}', [EmployeeController::class, 'getEmployeeLeadDetails']);

        Route::get('/monitor-report', [LeadController::class, 'monitorReport'])->name('monitor-report');
        Route::get('/get-filter-values/{filterType}', [LeadController::class, 'getFilterValues']);
        Route::post('/get-leads', [LeadController::class, 'getLeads']);
        Route::get('/get-tasks/{leadId}', [LeadController::class, 'getTasks']);



        Route::get('/employees-monitor', [LeadController::class, 'indexEmployeeMonitor'])->name('employees-monitor');
        Route::get('employees/{employee}/leads', [LeadController::class, 'fetchLeadsByEmp']);
        Route::get('leads/{lead}/detailx', [LeadController::class, 'fetchLeadDetailsPerEmp']); //-1
        Route::get('/leads/{id}/timeline', [LeadController::class, 'timeline'])->name('leads.timeline');


        Route::get('/roles-view', [RoleController::class, 'view'])->name('get-all-roles');
        Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
        Route::delete('/role-types/{role}', [RoleController::class, 'destroy'])->name('role-types.destroy');

        Route::get('/property-types-view', [PropertyTypeController::class, 'view'])->name('property-types.view');
        Route::post('/property-types', [PropertyTypeController::class, 'store'])->name('property-types.store');
        // Route::get('/property-types/{propertyType}/edit', [PropertyTypeController::class, 'edit'])->name('property-types.edit');
        Route::delete('/property-types/{propertyType}', [PropertyTypeController::class, 'destroy'])->name('property-types.destroy');

        Route::get('/property-specs-view', [PropertySpecController::class, 'view'])->name('property-specs.view');
        Route::post('/property-specs', [PropertySpecController::class, 'store'])->name('property-specs.store');
        Route::delete('/property-specs/{propertySpec}', [PropertySpecController::class, 'destroy'])->name('property-specs.destroy');

        Route::get('/lead-sources-view', [LeadSourceController::class, 'view'])->name('lead-sources.view');
        Route::post('/lead-sources', [LeadSourceController::class, 'store'])->name('lead-sources.store');
        Route::delete('/lead-sources/{source}', [LeadSourceController::class, 'destroy'])->name('lead-sources.destroy');

        Route::get('/lead-status-view', [LeadStatusController::class, 'view'])->name('lead-status.view');
        Route::post('/lead-statuses', [LeadStatusController::class, 'store'])->name('lead-statuses.store');
        Route::delete('/lead-status/{status}', [LeadStatusController::class, 'destroy'])->name('lead-status.destroy');

        Route::get('/lead-completion-filter-view', [LeadStatusController::class, 'completionView'])->name('lead-completion-filter.view');
        Route::get('/leads/closed-successfully', [LeadStatusController::class, 'fetchClosedSuccessfullyLeads']);
        Route::get('/leads/closed-with-failure', [LeadStatusController::class, 'fetchClosedWithFailureLeads']);


        Route::get('/date-range-report', [LeadController::class, 'dateRangeReport'])->name('date-range-report');
        Route::get('/get-tasks-by-date-range/{startDate}/{endDate}', [LeadController::class, 'getTasksByDateRange']);
        Route::get('/get-leads-by-date-range/{startDate}/{endDate}', [LeadController::class, 'getLeadsByDateRange']);

        Route::post('/leadstatuschange/{id}/toggle-status', [EntityStatusController::class, 'toggleleadStatuschange']);
        Route::post('/leadsourcechange/{id}/toggle-status', [EntityStatusController::class, 'toggleleadSourcechange']);
        Route::post('/propertytypestatusechange/{id}/toggle-status', [EntityStatusController::class, 'toggleProptypeStatuschange']);
        Route::post('/propspecstatuschange/{id}/toggle-status', [EntityStatusController::class, 'togglePropSpecStatuschange']);
        Route::post('/rolestatuschange/{id}/toggle-status', [EntityStatusController::class, 'toggleRoleStatuschange']);


            Route::get('/billing', [BillingController::class, 'index'])->name('billing.index');
            Route::get('/billing/create/{lead}', [BillingController::class, 'create'])->name('billing.create');
            Route::post('/billing/{lead}', [BillingController::class, 'store'])->name('billing.store');
            Route::get('/billing/{billing}', [BillingController::class, 'show'])->name('billing.show');

            // Route::get('/payment/{billing}', [BillingController::class, 'create'])->name('payment.create');
            // Route::post('/payment/{billing}', [BillingController::class, 'store'])->name('payment.store');
            Route::post('/billing/payment/{billId}', [BillingController::class, 'makePayment'])->name('billing.payment');
            Route::get('/billing/{billing}/transactions', [BillingController::class, 'getTransactions'])->name('billing.transactions');


        //main reports
        //unassigned leads
        Route::get('/unassigned-leads', [ReportController::class, 'unassignedLeads'])->name('unassigned-leads');
        //assigned leads
        Route::get('/assigned-leads', [ReportController::class, 'assignedLeads'])->name('assigned-leads');
        //lead report
        Route::get('/main-lead-report', [ReportController::class, 'leadReport'])->name('lead-report-main');
        Route::get('/leads/{id}/detail', [ReportController::class, 'getDetailsOfLeads'])->name('leads.detail');
        Route::get('/leads/{id}/timelines', [ReportController::class, 'timelineOfActivity'])->name('leads.timeline');
        // storeTaskByAdminToEmployee
        Route::post('/tasks', [LeadController::class, 'storeTaskByEmployee'])->name('tasks.store');

        //billing report
        Route::get('/unbilled-leads', [ReportController::class, 'getUnbilledLeads'])->name('unbilled-leads');
        Route::get('/billed-leads', [ReportController::class, 'getBilledLeads'])->name('billed-leads');
        Route::get('/paid-leads', [ReportController::class, 'getPaidLeads'])->name('paid-leads');

        //notification report
        Route::get('/notification', [ReportController::class, 'notificationTasks'])->name('tasks.notification');
        Route::post('/notifcation/filter', [ReportController::class, 'filterNotificationTasks'])->name('tasks.notification.filter');
    });
});
