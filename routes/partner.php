<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\UserController;



Route::group(['middleware' => ['Partner']], function () {

    // Route::get('/partner/dashboard', function () {
    //     return view('/Partner/Dashboard');
    // });
    Route::get('/partner/dashboard', [PartnerController::class, 'dashboardView'])->name('dashboardView');

    Route::get('/partner/profileEdit/{id}', [PartnerController::class, 'EditProfile'])->name('EditProfile');

    Route::get('/partner/uploadDocument/{id}', [PartnerController::class, 'checkDocument'])->name('saveandUpdateDocument');

    Route::post('/partner/saveDocuent', [PartnerController::class, 'saveDocument'])->name('saveandUpdateDocument');
    Route::post('/partner/saveKYC', [PartnerController::class, 'saveKYCDocument'])->name('saveKYCDocument');

    Route::post('/partner/updateProfile', [PartnerController::class, 'updateDocument'])->name('UpdateProfile');
    Route::get('/partner/Change-Password/{id}', [PartnerController::class, 'Changepassword'])->name('Change-Password');
    Route::post('/partner/profile-Password-Change', [PartnerController::class, 'ProfileChangePasswordAjax'])->name('profile-Password-Change');
    Route::get('/partner/allLeads', [PartnerController::class, 'showAllLeadsFromHomePage']);
    Route::post('/partner/accepted-flag-update', [PartnerController::class, 'updateAccptedFlag']);
    Route::post('/partner/delclain-flag-update', [PartnerController::class, 'updateDeclainFlag']);
    Route::get('/partner/view-dcuments/{id}', [PartnerController::class, 'requestForAdditionalDoc']);
    Route::get('/partner/view-complete-job', [PartnerController::class, 'showjobComplete']);
    Route::get('/partner/save-complet-lead-Doc', [PartnerController::class, 'activeJobNumberFetch']);
    Route::get('/partner/getServiceNameonJobNumber', [PartnerController::class, 'fetchActiveServiceName']);
    Route::post('/partner/savecompleteJob', [PartnerController::class, 'saveCompleteJob']);
    Route::post('/partner/delete-job', [PartnerController::class, 'DeleteJob'])->name('DeleteJob');
    Route::get('/partner/fetch-update-job/{id}', [PartnerController::class, 'fetchUpdateJob'])->name('fetchUpdateJob');
    Route::post('/partner/updateJob', [PartnerController::class, 'updateJobe'])->name('updateJobe');
    // Route::get('/verifiedPartner', function () {
    //     return view('auth/verifyEmail');
    // });

    // New concept 24-05-2022

    // New Leads
    Route::get('/partner/leadstomachfin', [PartnerController::class, 'showAllLeadsSendToMachfin']);
    Route::get('/partner/leadCreate', [PartnerController::class, 'creatLeads']);
    Route::get('/partner/getcategory', [UserController::class, 'fetchActiveCategory']);
    Route::get('/partner/getsubservice', [UserController::class, 'fetchActiveSubservice']);
    Route::post('/partner/savelead', [PartnerController::class, 'saveLeads']);
    Route::get('/partner/leadgetforupdate', [PartnerController::class, 'updateShowLeads']);
    Route::post('/partner/updateLeads', [PartnerController::class, 'updateLeads']);
    Route::post('/partner/deleteLeads', [PartnerController::class, 'deleteLeads']);
    //Route::post('/user/save-services', [UserController::class, 'saveServices']);
    Route::get('/partner/leadStatus', [PartnerController::class, 'leadsTracks']);
    // Route::get('/partner/check-ExistingService', [PartnerController::class, 'checkExstingServices']);
    Route::get('/partner/tracklist', [PartnerController::class, 'trackService']);
    Route::get("/partner/upload-aditional-lead-Doc/{id}", [PartnerController::class, 'fetchUploadDocument']);
    Route::post('/partner/update-Upload-others-document', [PartnerController::class, 'uploadDocument']);

    Route::get("/partner/view-doc-payment/{jobnumber}", [PartnerController::class, 'fetchAllDocumentandPayment']);
    Route::get('/partner/AllPayment', [PartnerController::class, 'payaALL']);
    Route::get('/partner/Edit-Leads-For/{id}', [PartnerController::class, 'FetchLeadsfordit']);
    // Route::post('/partner/updatelead', [PartnerController::class, 'updateLeads']);
        // End new leads
   Route::get('/partner/bankaccount', function () {
        return view('Partner/bankaccountdetails');
    });
     Route::post('/partner/saveBankDetails', [PartnerController::class, 'SaveBankDetails']);
     Route::get('/partner/updatebankdetails/{id}', [PartnerController::class, 'EditBankDetails'])->name('EditBankDetails');
     Route::post('/partner/editBankDetails', [PartnerController::class, 'updateBankDetails']);

});
