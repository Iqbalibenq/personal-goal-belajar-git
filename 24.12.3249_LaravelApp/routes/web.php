<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminPartnerController;

/*
|--------------------------------------------------------------------------
| Web Routes - AMIKOM Event Hub (Edisi UTS)
|--------------------------------------------------------------------------
*/

// --- ROUTE PUBLIC / HALAMAN DEPAN ---
Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/event/{id}', [LandingController::class, 'detail'])->name('event.detail');
Route::get('/event/{id}/register', [LandingController::class, 'register'])->name('event.register');

// --- ROUTE PROSES TRANSAKSI (PERTEMUAN 6) ---
Route::post('/event/{id}/register', [TransactionController::class, 'store'])->name('event.store');


// --- ROUTE DASHBOARD ADMIN PANEL (KHUSUS UTS) ---
Route::prefix('admin')->name('admin.')->group(function () {
    // 1. Melihat Data Orderan Masuk (Pertemuan 6 Lanjutan)
    Route::get('/orders', [TransactionController::class, 'index'])->name('orders');

    // 2. CRUD + Search Kategori (Soal UTS 1 & 3)
    Route::resource('categories', AdminCategoryController::class);

    // 3. CRUD + Search Partner (Soal UTS 2 & 3)
    Route::resource('partners', AdminPartnerController::class);
});