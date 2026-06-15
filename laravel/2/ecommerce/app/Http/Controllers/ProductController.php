<?php

namespace App\Http\Controllers;

use App\Models\Product; // Memanggil model Product
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // 1. Ambil semua data produk dari database
        $products = Product::all();

        // 2. Kirim data produk ke file view yang ada di folder dashboard/products/
        return view('dashboard.products.index', compact('products'));
    }
}