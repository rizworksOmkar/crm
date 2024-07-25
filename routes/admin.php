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
        Route::get('/roles', [LeadController::class, 'getRoles'])->name('get-all-roles');
        Route::get('/roles/create', [LeadController::class, 'createRoles'])->name('admin-create-role');

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
        Route::get('/get-leads/{filterType}/{filterValue}', [LeadController::class, 'getLeads']);
        Route::get('/get-tasks/{leadId}', [LeadController::class, 'getTasks']);


        Route::get('employees-monitor', [LeadController::class, 'indexEmployeeMonitor']);
        Route::get('employees/{employee}/leads', [LeadController::class, 'fetchLeadsByEmp']);
        Route::get('leads/{lead}/details', [LeadController::class, 'fetchLeadDetailsPerEmp']);


    });
});
