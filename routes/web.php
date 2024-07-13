<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Country;
//PaymentController
use App\Http\Controllers\PaymentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/pass', function () {
//   $hasspass = Hash::make("1234") ;
//   echo $hasspass ;die();
// });
Route::get('/optimize-clear', function () {
    \Artisan::call('config:cache');
    \Artisan::call('cache:clear');
    \Artisan::call('route:clear');
    \Artisan::call('view:clear');
    return redirect()->back();
  });

// Route::get('/adminlogin', function () {

//     return view('admin/admin-login');
//   });
// Pacakage fetch on click on internation destination
//Route::get('/international-package ', [HomeController::class, 'getCitybyINTdestination']);

// AUTH
require __DIR__.'/auth.php';

// Admin
require __DIR__.'/admin.php';

// Partner
require __DIR__.'/partner.php';

// Normal user
require __DIR__.'/normaluser.php';

// general
require __DIR__.'/general.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::any('phonepe-response',[PaymentController::class,'response'])->name('response');
Route::any('/phonepe-payment-response',[PaymentController::class,'responsetPayment'])->name('responsetPayment');
