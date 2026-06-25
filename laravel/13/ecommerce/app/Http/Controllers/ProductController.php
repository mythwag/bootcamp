<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory; // WAJIB DIIMPORT: Untuk mengambil daftar kategori di form
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Mengambil data produk dengan relasi kategorinya, dipaginasi 10 data per halaman
        $products = Product::with('category')->simplePaginate(10);

        // Kirim data ke view index utama
        return view('admin.products.index', compact('products'));
    }

    // ==========================================
    // TUGAS BARU: MENAMPILKAN HALAMAN TAMBAH PRODUK
    // ==========================================
    public function create()
    {
        // Mengambil semua data kategori dari database untuk opsi dropdown pilihan di form
        $categories = ProductCategory::all();
        
        // Mengarahkan ke file view form tambah produk
        return view('admin.products.create', compact('categories'));
    }

    // ==========================================
    // TUGAS BARU: VALIDASI INPUT & SIMPAN KE DATABASE
    // ==========================================
    public function store(Request $request)
    {
        // 1. Jalankan fungsi validasi kecocokan data input produk
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id', // Kategori wajib valid terdaftar di DB
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        // 2. Perintah menyimpan data ke tabel products sesuai struktur kolom bahasa Inggris Anda
        Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $request->image, // Atribut gambar opsional
        ]);

        // 3. Alihkan kembali halaman ke daftar tabel produk dengan pesan sukses
        return redirect('admin/products')->with('success', 'Produk berhasil disimpan!');
    }
    
    // 1. Menampilkan halaman edit produk berdasarkan ID
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = ProductCategory::all(); // Diperlukan untuk isi dropdown kategori
        return view('admin.products.edit', compact('product', 'categories'));
    }

    // 2. Memvalidasi input perubahan produk dan menyimpannya di database
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        $product = Product::findOrFail($id);
        $product->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $request->image,
        ]);

        return redirect('admin/products')->with('success', 'Produk berhasil diperbarui!');
    }

    // ==========================================
    // 3. Menghapus data produk berdasarkan ID (SELESAI)
    // ==========================================
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('admin/products')->with('success', 'Produk berhasil dihapus!');
    }
}