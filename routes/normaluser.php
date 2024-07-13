<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Country;
use App\Models\Admin\State;
use App\Models\Admin\City;
use App\Http\Controllers\UserAdmin\UserAdminMenueController;
use App\Http\Controllers\UserAdmin\UserAdminController;
use App\Http\Controllers\PhonepayController;
use App\Http\Controllers\PaymentController;



Route::group(['middleware' => ['disabled_back_button']], function () {

    Route::group(['middleware' => ['User']], function () {

       

        Route::get('/user/dashboard', [UserAdminMenueController::class, 'userDashboard'])->name('User-dashboard');
        Route::get('/user/transferData/{userid}/{startdate}/{selectedcity}/{pacakageID}/{adults}/{childs}/{infants}/{pricePeroerson}', [UserAdminMenueController::class, 'transferDatatobook']);
        Route::post('/user/JourneyDetailsStore/', [UserAdminController::class, 'JourneyDetailsSave'])->name('User-bookingsave');
        Route::get('/user/JourneyPersonDetails/{bookingID}/{adults}/{childs}/{infants}', [UserAdminMenueController::class, 'Journeymembaerget']);
        Route::get('/user/writReviews', [UserAdminMenueController::class, 'writeReviews']);
        Route::get('/user/addReview', [UserAdminMenueController::class, 'addwriteReviews']);
        Route::get('/user/reviews', [UserAdminMenueController::class, 'reviews']);
        Route::get('/user/ReviewPhotos', [UserAdminMenueController::class, 'allReviewPhotos']);

        Route::post('/user/JourneyDetailsUpdate/', [UserAdminController::class, 'JourneyDetailsUpdate'])->name('User-bookingupdate');

        // ***ADULT RIDER****
        Route::get('/user/countnoofAdults/', [UserAdminController::class, 'noofadultCount'])->name('User-count-noofAdult');
        Route::post('/user/JourneyAdultStore/', [UserAdminController::class, 'AdultStore'])->name('User-journeynoOfAdult-save');
        Route::get('/user/getnoofAdults/', [UserAdminController::class, 'GetnoofadultBybookingId'])->name('User-Get-noofAdult-bybookingId');
        Route::delete('/deleteAdultRiderDetails/{id}', [UserAdminController::class, 'DeleteAdultRiderDetails'])->name('user-Delete-AdultRider-delete');
        // Route::post('/user/updtaeNoofAdult', [UserAdminController::class, 'UpdateNoOfAdult'])->name('User-update-noofAdult-bybookingId');
        // Edit Section

        // ***End ADULT RIDER****
        // ***CHILD RIDER****
        Route::get('/user/countnoofChildAdults/', [UserAdminController::class, 'noofChildadultCount'])->name('User-count-noofChildAdult');
        Route::post('/user/JourneyChildAdultStore/', [UserAdminController::class, 'ChildAdultStore'])->name('User-journeynoOfChildAdult-save');
        Route::get('/user/getnoofChildAdults/', [UserAdminController::class, 'GetnoofChildadultBybookingId'])->name('User-Get-noofChildAdult-bybookingId');
        Route::delete('/deleteChildRiderDetails/{id}', [UserAdminController::class, 'DeleteChildRiderDetails'])->name('user-Delete-ChildRider-delete');
        // ** INFANT RIDER
        Route::get('/user/countnoofInfantAdults/', [UserAdminController::class, 'noofInfantCount'])->name('User-count-noofInfant');
        Route::post('/user/JourneyInfantAdultStore/', [UserAdminController::class, 'InfantStore'])->name('User-journeynoOfInfant-save');
        Route::get('/user/getnoofInfantAdults/', [UserAdminController::class, 'GetnoofInfantBybookingId'])->name('User-Get-noofInfant-bybookingId');
        Route::delete('/deleteInfantRiderDetails/{id}', [UserAdminController::class, 'DeleteInfantRiderDetails'])->name('user-Delete-InfantRider-delete');

        Route::get('/user/viewBooking/{bookingID}', [UserAdminMenueController::class, 'viewBooking']);

        Route::get('/user/downloadBooking/{bookingID}', [UserAdminMenueController::class, 'downloadBooking']);


        Route::post('/user/AllFamlkyDetailsUpdate/', [UserAdminController::class, 'FamilyDetailsUpdate'])->name('User-FamilyDetails-Update');
        Route::get('/user/getDetailsforedit/{bookingid}', [UserAdminMenueController::class, 'GetDetailsForEdit'])->name('user-Get-Detailsfor-Edit');
        Route::get('/user/getRiderDetailsforedit/{bookingid}/{userid}', [UserAdminMenueController::class, 'GetRiderDetailsForEdit'])->name('user-Get-Riderfor-Edit');


        // routes/web.php


        Route::get('/payPG/{bookingID}', [PaymentController::class, 'pay'])->name('payPG');
        // Route::any('/phonepe-payment-response',[PaymentController::class,'responsetPayment'])->name('responsetPayment');
        //Route::get('/success-payment', [PaymentController::class, 'paymentPage'])->name('responseSuccess');
      
       



        // // Route::get('pg', [PhonepayController::class, 'index']);

        // // Route::post('pay', [PhonepayController::class, 'payment_init']);
        // // Route::get('pay-refund-view', [PhonepayController::class, 'refund']);
        // // Route::get('pay-refund', [PhonepayController::class, 'payment_refund']);
        // // Route::any('pay-return-url', [PhonepayController::class, 'payment_return'])->name('pay-return-url');
        // // Route::post('pay-callback-url', [PhonepayController::class, 'payment_callback'])->name('pay-callback-url');
        // // Route::any('pay-refund-callback', [PhonepayController::class, 'payment_refund_callback'])->name('pay-refund-callback');
        // });
    });
});
