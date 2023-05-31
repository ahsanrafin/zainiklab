<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FrontPageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*==============================================================
    Author Name: Abul Ahasan Rafin.
    Project Name: Interview Test Project.
==============================================================*/

//Route for homepage
Route::get('/', function () {
    return view('frontpage');
});

Auth::routes();

//Route for customer profile (for sharing, or public users).
Route::get('/public/profile/{id}', [FrontPageController::class, 'getProfile'])->name('public.profile');

Route::group(['prefix'=>'admin', 'middleware' => ['admin', 'auth']], function(){
    //Route for admin dashboard.
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    //Route for get the list of customers.
    Route::get('/customers', [AdminController::class, 'getCustomers'])->name('get.customers');
    //Route for delete customer.
    Route::delete('/delete/{user}/customer/', [AdminController::class, 'destroy'])->name('destroy.customer');
    //Route for block customer.
    Route::get('/customer/{user}/block', [AdminController::class, 'blockCustomer'])->name('customer.block');
    //Route for unblock customer.
    Route::get('/customer/{user}/unblock', [AdminController::class, 'unblockCustomer'])->name('customer.unblock');
});

Route::group(['prefix'=>'customer', 'middleware' => ['customer', 'auth']], function(){
    //Route for customer dashboard.
    Route::get('/dashboard', [CustomerController::class, 'index'])->name('customer.dashboard');
});

