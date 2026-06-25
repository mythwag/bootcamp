<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    // ==========================================
    // FUNGSI YANG HILANG: MENAMPILKAN DAFTAR KATEGORI
    // ==========================================
    public function index()
    {
        // Ambil semua data kategori dari database
        $categories = ProductCategory::all();

        // Mengarahkan ke file view daftar kategori milik Anda
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        ProductCategory::create([
            'name' => $request->name,
        ]);

        return redirect('admin/categories')->with('success', 'Kategori produk berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $category = ProductCategory::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = ProductCategory::findOrFail($id);
        $category->update([
            'name' => $request->name,
        ]);

        return redirect('admin/categories')->with('success', 'Kategori berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $category = ProductCategory::findOrFail($id);
        $category->delete();

        return redirect('admin/categories')->with('success', 'Kategori berhasil dihapus!');
    }
}