<?php

use App\Http\Controllers\Booking\BookingController;
use App\Http\Controllers\Mail\BookingMailController;
use App\Http\Controllers\Service\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/services', [ServiceController::class, 'view'])->name('services');
    Route::get('/service/{id}', [ServiceController::class, 'details'])->name('service.details');
    Route::get('/service-create', [ServiceController::class, 'viewCreate'])->name('service.create');
    Route::post('/service-store', [ServiceController::class, 'store'])->name('service.store');

    Route::get('/bookings', [BookingController::class, 'view'])->name('bookings');
    Route::get('/service/{service}/book', [BookingController::class, 'create'])->name('booking.create');
    Route::post('/service/{service}/book', [BookingController::class, 'store'])->name('booking.store');

    Route::post('/bookings/{id}/accept', [BookingController::class, 'accept'])->name('bookings.accept');
    Route::post('/bookings/{id}/reject', [BookingController::class, 'reject'])->name('bookings.reject');
});
