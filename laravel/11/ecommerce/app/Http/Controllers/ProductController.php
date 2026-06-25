<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory; // WAJIB DIIMPORT: Untuk mengambil daftar kategori di form
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Mengambil data produk dengan relasi kategorinya, dipaginasi 2 data per halaman
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
}