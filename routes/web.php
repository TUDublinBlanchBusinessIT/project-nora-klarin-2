<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AppointmentController;

// Public welcome
Route::get('/', fn() => view('welcome'))->name('home');

// Auth routes (Breeze/Jetstream)
require __DIR__.'/auth.php';

// Logout
Route::post('/logout', function () {
    Auth::logout();
    session()->invalidate();
    session()->regenerateToken();
    return redirect('/');
})->name('logout');

// Customer area (any logged-in user with role customer)
Route::middleware(['auth'])->group(function () {
    // Customer dashboard
    Route::get('/customer/dashboard', [CustomerController::class, 'dashboard'])
    ->middleware(['auth'])
    ->name('dashboard');

    // Browse services
    Route::get('/services', [ServiceController::class, 'index'])
         ->name('services.index');

    // Book an appointment
    Route::get('/appointments/create', [AppointmentController::class, 'create'])
         ->name('appointments.create');
    Route::post('/appointments', [AppointmentController::class, 'store'])
         ->name('appointments.store');

    // My appointments
    Route::get('/my-appointments', [AppointmentController::class, 'myAppointments'])
         ->name('appointments.mine');
});

// Admin area (only role=admin)
Route::middleware(['auth','admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])
         ->name('admin.dashboard');

    // Admin CRUD
    Route::resource('services', ServiceController::class)
         ->except(['show']);
    Route::resource('appointments', AppointmentController::class)
         ->except(['create','store','show','edit','update']);
    Route::resource('customers', CustomerController::class)
         ->except(['show']);
});
