<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AreaController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserGroupController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PettyCashAccountGroupController;
use App\Http\Controllers\PettyCashAccountController;
use App\Http\Controllers\PettyCashTransactionController;
use App\Http\Controllers\PettyCashReportController;
use App\Http\Controllers\PurchaseTypeController;
use App\Http\Controllers\DashboardController;


Route::get('/', [DashboardController::class, 'index']);

Route::resource('areas', AreaController::class);
Route::resource('cities', CityController::class);
Route::resource('sites', SiteController::class);
Route::resource('user-groups', UserGroupController::class);
Route::resource('users', UserController::class);
Route::resource('petty-cash-account-groups', PettyCashAccountGroupController::class);
Route::resource('petty-cash-accounts', PettyCashAccountController::class);
Route::resource('petty-cash-transactions', PettyCashTransactionController::class);
Route::resource('petty-cash-reports', PettyCashReportController::class);
Route::resource('purchase-types', PurchaseTypeController::class);
