<?php

use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\OrderReceiptController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/dashboard');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login')->middleware('guest');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->middleware('guest');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::get('/pos', function () {
    return view('pos');
})->middleware('auth')->name('pos');

Route::get('/orders', function () {
    return view('orders');
})->middleware('auth')->name('orders');

Route::get('/orders/{order}/receipt', [OrderReceiptController::class, 'show'])
    ->middleware('auth')
    ->name('orders.receipt');

Route::get('/inventory', function () {
    return view('inventory');
})->middleware(['auth', 'admin'])->name('inventory');

Route::get('/reports', function () {
    return view('reports');
})->middleware(['auth', 'admin'])->name('reports');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout')->middleware('auth');
