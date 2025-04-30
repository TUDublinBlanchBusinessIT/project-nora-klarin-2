<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\TechnicianController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;

Route::get('/', fn() => view('welcome'))->name('home');


require __DIR__.'/auth.php';

Route::post('/logout', function () {
    Auth::logout();
    session()->invalidate();
    session()->regenerateToken();
    
    return redirect()->route('register');
})->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/customer/dashboard', [CustomerController::class, 'dashboard'])
         ->name('dashboard');

    
    Route::get('/services', [ServiceController::class, 'index'])
         ->name('services.index');

    
    Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');

    Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');


    
    Route::get('/my-appointments', [AppointmentController::class, 'myAppointments'])
         ->name('appointments.mine');
});

Route::resource('services', ServiceController::class)->except(['show']);


Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('appointments', AppointmentController::class)->except(['create', 'store', 'show']);
    Route::resource('customers', CustomerController::class)->except(['show']);
    Route::resource('technicians', TechnicianController::class);
});

Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');

Route::get('/product/displaygrid', [ProductController::class, 'displayGrid'])->name('products.displaygrid');

Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');


