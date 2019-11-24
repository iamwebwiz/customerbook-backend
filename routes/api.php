<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', [CustomerController::class, 'fetchCustomers'])->name('customers');
Route::post('store', [CustomerController::class, 'storeCustomer'])->name('customers.store');
Route::get('customer', [CustomerController::class, 'fetchSingleCustomer'])->name('customers.customer');
