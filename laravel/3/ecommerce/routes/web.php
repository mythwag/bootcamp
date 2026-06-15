<?php

use Illuminate\Support\Facades\Route;
// Baris di bawah ini penting untuk mengenalkan Controller ke sistem Route
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini adalah tempat Anda mendaftarkan semua route untuk website Anda.
|
*/

// 1. Halaman Utama / Beranda Restoran (Homepage)
Route::get('/', function () {
    return view('welcome'); // Perintah ini untuk membuka welcome.blade.php Anda
});

// 2. Halaman Daftar Produk
// Ketika user membuka url /products, Pelayan (ProductController) akan menjalankan fungsi bernama 'index'
Route::get('/products', [ProductController::class, 'index']);

// 3. Halaman Keranjang Belanja
Route::get('/cart', function () {
    return view('cart'); // Ini akan membuka file resources/views/cart.blade.php
});

// 4. Halaman Proses Checkout / Pemesanan
// Ketika user membuka url /checkout, Pelayan (OrderController) akan menjalankan fungsi bernama 'create'
Route::get('/checkout', [OrderController::class, 'create']);
Route::resource('products', ProductController::class);