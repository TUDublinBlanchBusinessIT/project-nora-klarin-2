<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/', function () {
    return view('welcome');
});

Route::resource('customers', CustomerController::class);


Route::resource('customers', App\Http\Controllers\CustomerController::class);


Route::resource('services', App\Http\Controllers\ServiceController::class);


Route::resource('appointments', App\Http\Controllers\AppointmentController::class);

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/register'); // 👈 Redirect to registration page
})->name('logout');



