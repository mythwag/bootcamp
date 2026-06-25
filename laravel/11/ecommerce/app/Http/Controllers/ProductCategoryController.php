<?php
namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    // Fungsi untuk menampilkan halaman tambah kategori produk
    public function create()
    {
        return view('admin.categories.create');
    }

    // Fungsi untuk memvalidasi input dan menyimpannya di database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Simpan ke database
        ProductCategory::create([
            'name' => $request->name,
        ]);

        return redirect('admin/categories')->with('success', 'Kategori produk berhasil ditambahkan!');
    }
}