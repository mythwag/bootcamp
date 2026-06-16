<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index()
    {
        // Mengambil semua data produk
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }
}