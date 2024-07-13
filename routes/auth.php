<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
Auth::routes();
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');