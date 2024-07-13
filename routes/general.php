<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Country;
use App\Models\Admin\State;
use App\Models\Admin\City;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Admin\DataStoreController;
use App\Http\Controllers\Admin\MasterDataController;
use App\Http\Controllers\Admin\RuleEngineController;
use App\Http\Controllers\flight\FlightController;
use App\Http\Controllers\PhonePeController;
// use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PhonepayController;
use App\Http\Controllers\Auth\RegisterController;
//landing Page
// Route::get('/', function () {
//     return view('/general/landing');
// });
Route::get('/', [FrontendController::class, 'index'])->name('user.home');
Route::get('/contact', [FrontendController::class, 'contact'])->name('user.contact');
Route::get('/tour', [FrontendController::class, 'package'])->name('user.package');

Route::get('/about', [FrontendController::class, 'about'])->name('user.about');
Route::get('/Services', [FrontendController::class, 'services'])->name('user.services');
Route::get('/SubServices', [FrontendController::class, 'subservices'])->name('user-sub-services');
Route::get('/viewDusbserviceDetails/{id}', [FrontendController::class, 'viewsubservices'])->name('user-view-sub-services');
Route::get('/loginuser', [FrontendController::class, 'ulogin'])->name('user.login');
Route::get('/registeruser', [FrontendController::class, 'uregister'])->name('user.register');
Route::get('/admin', [FrontendController::class, 'adminlogin'])->name('admin.home');


Route::get('/flighttticket ', [FrontendController::class, 'getfightTicket']);

Route::get('/international-package/{id} ', [FrontendController::class, 'getCitybyINTdestination']);
Route::get('/domestic-package/{id} ', [FrontendController::class, 'getCitybyDOMdestination']);
Route::get('/package-details/{packid} ', [FrontendController::class, 'getPackagedetails']);



// Conversation
Route::get('/conversation/{packid} ', [FrontendController::class, 'getConversation']);


Route::get('/hotel ', [FrontendController::class, 'getHotel']);
Route::get('/hotelDetails ', [FrontendController::class, 'getHotelDetails']);

Route::get('/flight ', [FrontendController::class, 'getFlight']);
Route::get('/flightBooking ', [FrontendController::class, 'getFlightBooking']);
Route::get('/flightSeat ', [FrontendController::class, 'getFlightSeat']);
Route::get('/flightConfirmTicket ', [FrontendController::class, 'getflightConfirmTicket']);

//filter

Route::post('filter-packages', [FrontendController::class, 'filterPackages'])->name('packages.intfilterPackages');
Route::post('filter-packages-DOM', [FrontendController::class, 'filterPackagesDOM'])->name('packages.filterPackagesDOM');
// Route::get('/adminlogin', [LoginController::class, 'adminlogin'])->name('admin.home');
//email && password check exit or not in our db
Route::post('/admin-check-email-password',[FrontendController::class, 'adminEmailPasswordCheck'])->name('check-email-password');
Route::get('/allpacakages/{id}/{category}',[FrontendController::class,'allpacakagesShow']);
Route::get('/allpacakagesbyType/{packageTypeid}/{packageTypecategory}',[FrontendController::class,'allpacakagesShowbyType']);
Route::get('/allpackages',[FrontendController::class,'getAllpackages'])->name('allpacakages');


Route::get('/user-registration-check', [FrontendController::class, 'checkemail']);
Route::post('/user-registration-save', [FrontendController::class, 'createnewuser']);

Route::get('/email-verification-status/{email}', [RegisterController::class, 'updateemailverificationstatus']);

Route::get('/AllInternationalPacakges', [FrontendController::class, 'AllinternationapacakageslGet'])->name('AllInternationalPacakages');
Route::get('/AllFixedDepartureInternationalPacakges', [FrontendController::class, 'AllinternationapacakageslFDGet'])->name('AllInternationalPacakagesFD');

Route::post('/intfilter-packages', [FrontendController::class, 'AllInternationalPackageFilter'])->name('packages.intfilter');
Route::post('/FDintfilter-packages', [FrontendController::class, 'AllInternationalPackageFDFilter'])->name('packages.intfilter-FD');
//AllDomesticPackageFilter
Route::post('/domfilter-packages', [FrontendController::class, 'AllDomesticPackageFilter'])->name('packages.domfilter');
Route::post('/domfilter-packages-FD', [FrontendController::class, 'AllDomesticPackageFDFilter'])->name('packages-domfilter-fd');

Route::get('/AllDomesticPacakges', [FrontendController::class, 'AlldomesticpacakagesGet'])->name('AllDomesticPacakages');

Route::get('/AllDomesticPacakgesFD', [FrontendController::class, 'AlldomesticpacakagesFDGet'])->name('AllDomesticPacakagesFD');
Route::get('/AllInternationaldestination', [FrontendController::class, 'AllInternationaldestinationGet'])->name('AllInternationlaldestination');
Route::get('/AllDomesticdestination', [FrontendController::class, 'AllDomesticdestinationGet'])->name('AllDomesticdestination');



//flight
Route::get('/flight-booking-process', [FlightController::class, 'flightBookingProcess'])->name('flight-booking-process');
Route::post('/flight-normal-search', [FlightController::class, 'flightNormalSearch'])->name('flight-normal-search');
Route::post('/fare-quote', [FlightController::class, 'fareQuote'])->name('fare-quote');
Route::get('/flightbooking', [FlightController::class, 'flightBooking'])->name('flight-booking');
//ssr post
Route::post('/flight-ssr', [FlightController::class, 'flightSsr'])->name('flight-ssr');
///flight-book-with-ssr
Route::post('/flight-book-with-ssr', [FlightController::class, 'flightBookWithSsr'])->name('flight-book-with-ssr');

Route::get('/flightticket ', [FlightController::class, 'getflightTicket']);


Route::get('/privacy&policy', [FrontendController::class, 'PrivacyPolicy'])->name('user.privacy&policy');
Route::get('/terms&conditions', [FrontendController::class, 'TermsConditions'])->name('user.terms&conditions');
Route::get('/refundPolicy', [FrontendController::class, 'RefundPolicy'])->name('user.refundPolicy');


Route::get('/hotelApi ', [FrontendController::class, 'getHotelApi']);
Route::get('/seee ', [FlightController::class, 'see']);

// Route::get('/packageconfirmationEmail', function () {
//         return view('/emails/packageconfirmationEmail');
//     });

    Route::get('/registerEmail', function () {
        return view('/emails/register-email');
    });

    Route::get('/packageconfirmationEmail', function () {
        return view('/emails/packageconfirmation-email');
    });

    Route::get('/discountInternational', function () {
         return view('/userfrontend/discountInternational');
    });

    Route::get('/discountDomestic', function () {
        return view('/userfrontend/discountDomestic');
    });
//package payment call to phonePePayment via payment controller post method

// Route::get('/phonepe-payment', [PhonePeController::class, 'phonePePayment'])->name('phonepe.payment');
// Route::post('/redirect-url', [PhonePeController::class, 'handlePhonePeResponse'])->name('phonePeRedirect');

// Route::get('pg', [PhonepayController::class, 'index']);

// Route::get('pay', [PhonepayController::class, 'payment_init']);
// Route::get('pay-refund-view', [PhonepayController::class, 'refund']);
// Route::get('pay-refund', [PhonepayController::class, 'payment_refund']);
// Route::any('pay-return-url', [PhonepayController::class, 'payment_return'])->name('pay-return-url');
// Route::post('pay-callback-url', [PhonepayController::class, 'payment_callback'])->name('pay-callback-url');
// Route::any('pay-refund-callback', [PhonepayController::class, 'payment_refund_callback'])->name('pay-refund-callback');
