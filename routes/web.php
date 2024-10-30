<?php

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
    Route::get('/services-create', [ServiceController::class, 'viewCreate'])->name('service.create');
});
