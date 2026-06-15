<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

// 1. Halaman Utama
Route::get('/', function () {
    return view('welcome');
});

// 2. JALUR PRODUK ANDA (Pastikan baris ini ada dan tidak terhapus)
Route::get('/products', [ProductController::class, 'index']);

// 3. Halaman Beranda Keranjang
Route::get('/cart', function () {
    return view('cart');
});

// 4. Jalur Dashboard Bawaan Breeze
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Memuat sistem login/register milik Breeze
require __DIR__.'/auth.php';