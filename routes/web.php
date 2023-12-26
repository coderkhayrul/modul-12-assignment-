<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\TripController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::get('/', [HomeController::class, 'home'])->name('website.home');
Route::get('/schedule/{schedule}', [HomeController::class, 'viewSchedule'])->name('website.schedule.view');
Route::post('/ticket-booking', [HomeController::class, 'ticketBooking'])->name('website.ticket.booking');
Route::get('/my-ticket', [HomeController::class, 'myTicket'])->name('website.ticket')->middleware('auth');
Route::get('installation-guide', [HomeController::class, 'installationGuide'])->name('website.installation.guide');

// ADMIN ROUTE LIST HERE
Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('home');
    Route::get('/order-list', [AdminController::class, 'orderList'])->name('order');
    Route::resource('buses', BusController::class);
    Route::resource('trips', TripController::class);
    Route::resource('locations', LocationController::class);
    Route::resource('seats', SeatController::class);
    Route::resource('schedules', ScheduleController::class);
});
