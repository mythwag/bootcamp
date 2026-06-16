<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Mengambil data produk dengan relasi kategorinya, dipaginasi 2 data per halaman
        $products = Product::with('category')->simplePaginate(2);

        // Kirim data ke view
        return view('dashboard.products.index', compact('products'));
    }
}