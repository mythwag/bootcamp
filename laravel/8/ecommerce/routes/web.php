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
    // Mengambil total baris data
    $total_products = \App\Models\Product::count();
    $total_categories = \App\Models\ProductCategory::count();
    
    // Menghitung total seluruh klik/views produk di toko
    $total_clicks = \App\Models\Product::sum('views'); 

    return view('dashboard', compact('total_products', 'total_categories', 'total_clicks'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // JALUR KELOLA KATEGORI (Manual & Pasti Terdefinisi)
    Route::get('admin/categories', [App\Http\Controllers\Admin\AdminCategoryController::class, 'index'])->name('categories.index');
    Route::get('admin/categories/create', [App\Http\Controllers\Admin\AdminCategoryController::class, 'create'])->name('categories.create');
    Route::post('admin/categories', [App\Http\Controllers\Admin\AdminCategoryController::class, 'store'])->name('categories.store');
    Route::get('admin/categories/{category}/edit', [App\Http\Controllers\Admin\AdminCategoryController::class, 'edit'])->name('categories.edit');
    Route::put('admin/categories/{category}', [App\Http\Controllers\Admin\AdminCategoryController::class, 'update'])->name('categories.update');
    Route::delete('admin/categories/{category}', [App\Http\Controllers\Admin\AdminCategoryController::class, 'destroy'])->name('categories.destroy');

    // JALUR KELOLA PRODUK (Manual & Pasti Terdefinisi)
    Route::get('admin/products', [App\Http\Controllers\Admin\AdminProductController::class, 'index'])->name('products.index');
    Route::get('admin/products/create', [App\Http\Controllers\Admin\AdminProductController::class, 'create'])->name('products.create');
    Route::post('admin/products', [App\Http\Controllers\Admin\AdminProductController::class, 'store'])->name('products.store');
    Route::get('admin/products/{product}/edit', [App\Http\Controllers\Admin\AdminProductController::class, 'edit'])->name('products.edit');
    Route::put('admin/products/{product}', [App\Http\Controllers\Admin\AdminProductController::class, 'update'])->name('products.update');
    Route::delete('admin/products/{product}', [App\Http\Controllers\Admin\AdminProductController::class, 'destroy'])->name('products.destroy');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Memuat sistem login/register milik Breeze
require __DIR__.'/auth.php';