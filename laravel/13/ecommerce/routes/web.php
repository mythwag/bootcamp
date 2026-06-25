<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\DashboardController; // IMPORT BARU: Wajib ditambahkan
use App\Http\Controllers\ProfileController;

// 1. Halaman Utama Toko (Bisa diakses tanpa login)
Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [ProductController::class, 'index']);

// 2. Halaman Dashboard Utama (SEKARANG MEMANGGIL DASHBOARD CONTROLLER)
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// 3. Proteksi Autentikasi (Wajib Login)
Route::middleware('auth')->group(function () {
    
    // Rute Profile Bawaan Breeze
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // 4. Proteksi Hak Akses Keamanan ADMIN (Hanya Admin yang Bisa Masuk)
    Route::middleware('admin')->group(function () {
        
        // --- JALUR KELOLA KATEGORI ---
        Route::get('admin/categories', [ProductCategoryController::class, 'index'])->name('categories.index');
        
        // Menampilkan halaman tambah kategori produk
        Route::get('admin/categories/create', [ProductCategoryController::class, 'create'])->name('product-category.create');
        // Memproses simpan data kategori produk (Method: POST)
        Route::post('admin/categories', [ProductCategoryController::class, 'store'])->name('product-category.store');
        
        Route::get('admin/categories/{category}/edit', [ProductCategoryController::class, 'edit'])->name('categories.edit');
        Route::put('admin/categories/{category}', [ProductCategoryController::class, 'update'])->name('categories.update');
        Route::delete('admin/categories/{category}', [ProductCategoryController::class, 'destroy'])->name('categories.destroy');


        // --- JALUR KELOLA PRODUK ---
        Route::get('admin/products', [ProductController::class, 'index'])->name('products.index');
        
        // Menampilkan halaman tambah produk
        Route::get('admin/products/create', [ProductController::class, 'create'])->name('product.create');
        // Memproses simpan data produk (Method: POST)
        Route::post('admin/products', [ProductController::class, 'store'])->name('product.store');
        
        Route::get('admin/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('admin/products/{product}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('admin/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
        
    });
});

// Memuat rute bawaan login/register dari Breeze
require __DIR__.'/auth.php';