<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function index()
    {
        // Mengambil kategori beserta jumlah produk di dalamnya (withCount)
        $categories = ProductCategory::withCount('products')->get();
        return view('admin.categories.index', compact('categories'));
    }
}