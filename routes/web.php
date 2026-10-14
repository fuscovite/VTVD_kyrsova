<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'home'])->name('home');
Route::get('/services', [SiteController::class, 'services'])->name('services.index');
Route::get('/parts', [SiteController::class, 'parts'])->name('parts.index');

Route::get('/booking', [BookingController::class, 'create'])->name('bookings.create');
Route::post('/booking', [BookingController::class, 'store'])->name('bookings.store');

Route::middleware('guest')->group(function (): void {
    Route::get('/admin/login', [AuthController::class, 'create'])->name('login');
    Route::post('/admin/login', [AuthController::class, 'store'])->name('login.store');
});

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function (): void {
    Route::get('/bookings', [\App\Http\Controllers\Admin\BookingController::class, 'index'])->name('bookings.index');
    Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');
});
