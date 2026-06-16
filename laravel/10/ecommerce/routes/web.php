<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

// 1. Halaman Utama & Katalog Umum (Bisa diakses siapa saja)
Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [ProductController::class, 'index']);

Route::get('/cart', function () {
    return view('cart');
});

// 2. Halaman Dashboard Overview (Wajib Login dulu)
Route::get('/dashboard', function () {
    $total_products = \App\Models\Product::count();
    $total_categories = \App\Models\ProductCategory::count();
    $total_clicks = \App\Models\Product::sum('views'); 

    return view('dashboard', compact('total_products', 'total_categories', 'total_clicks'));
})->middleware(['auth', 'verified'])->name('dashboard');

// 3. Grup Rute Khusus User yang Sudah Login
Route::middleware('auth')->group(function () {
    // RUTE PROFILE BAWAAN BREEZE (Kembalikan ke sini agar tidak error 500)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // 4. Grup Rute Khusus yang Sudah Login DAN Memiliki Role ADMIN
    Route::middleware('admin')->group(function () {
       // JALUR KELOLA KATEGORI
    Route::get('admin/categories', [App\Http\Controllers\Admin\AdminCategoryController::class, 'index'])->name('categories.index');
    Route::get('admin/categories/create', [App\Http\Controllers\Admin\AdminCategoryController::class, 'create'])->name('categories.create');
    
    // UBAH NAMA ROUTE STORE KATEGORI DI SINI
    Route::post('admin/categories', [App\Http\Controllers\Admin\AdminCategoryController::class, 'store'])->name('product-category.store');
    
    Route::get('admin/categories/{category}/edit', [App\Http\Controllers\Admin\AdminCategoryController::class, 'edit'])->name('categories.edit');
    Route::put('admin/categories/{category}', [App\Http\Controllers\Admin\AdminCategoryController::class, 'update'])->name('categories.update');
    Route::delete('admin/categories/{category}', [App\Http\Controllers\Admin\AdminCategoryController::class, 'destroy'])->name('categories.destroy');

    // JALUR KELOLA PRODUK
    Route::get('admin/products', [App\Http\Controllers\Admin\AdminProductController::class, 'index'])->name('products.index');
    Route::get('admin/products/create', [App\Http\Controllers\Admin\AdminProductController::class, 'create'])->name('products.create');
    
    // UBAH NAMA ROUTE STORE PRODUK DI SINI
    Route::post('admin/products', [App\Http\Controllers\Admin\AdminProductController::class, 'store'])->name('product.store');
    
    Route::get('admin/products/{product}/edit', [App\Http\Controllers\Admin\AdminProductController::class, 'edit'])->name('products.edit');
    Route::put('admin/products/{product}', [App\Http\Controllers\Admin\AdminProductController::class, 'update'])->name('products.update');
    Route::delete('admin/products/{product}', [App\Http\Controllers\Admin\AdminProductController::class, 'destroy'])->name('products.destroy');
    });
});

// Memuat sistem login/register/logout milik Breeze
require __DIR__.'/auth.php';