<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Tambahkan fungsi index ini
    public function index()
    {
        return 'Menampilkan semua daftar produk dari database (ProductController)';
    }
}