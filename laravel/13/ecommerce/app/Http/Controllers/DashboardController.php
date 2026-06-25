<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil total baris data dari tabel produk
        $total_products = Product::count();

        // Mengambil total baris data dari tabel kategori
        $total_categories = ProductCategory::count();

        // Menghitung total jumlah seluruh klik (views) dari semua produk yang ada
        $total_clicks = Product::sum('views');

        // Kirim data statistik tersebut ke halaman depan dashboard
        return view('dashboard', compact('total_products', 'total_categories', 'total_clicks'));
    }
}