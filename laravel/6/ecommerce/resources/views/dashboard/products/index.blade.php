<x-layouts>
    <x-slot:title>Daftar Produk Toko</x-slot:title>

    <h1>Semua Produk Kami</h1>
    <p>Pilih produk favorit Anda dari katalog kami di bawah ini:</p>

    

    <div class="grid-produk" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 20px; margin-top: 20px;">
        @forelse($products as $product)
            <div class="card" style="background: white; border-radius: 8px; padding: 20px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); text-align: center;">
                <span style="background: #eee; padding: 3px 8px; border-radius: 12px; font-size: 11px; color: #666;">
                    {{ $product->category->name ?? 'Tanpa Kategori' }}
                </span>
                
                <h3 style="margin: 10px 0 5px 0;">{{ $product->name }}</h3>
                <p style="color: #666; font-size: 14px;">{{ $product->description ?? 'Tidak ada deskripsi.' }}</p>
                <p style="font-weight: bold; color: #ff750f; font-size: 18px;">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                <p style="font-size: 12px; color: #999; margin-bottom: 15px;">Stok: {{ $product->stock }} pcs</p>
                <a href="#" class="btn">+ Keranjang</a>
            </div>
        @empty
            <p style="text-align: center; font-style: italic; color: #888;">Belum ada produk yang dijual saat ini.</p>
        @endforelse
    </div>

<div class="pagination-wrapper" style="margin-top: 30px; display: flex; justify-content: center; width: 100%;">
    <div style="background: #1b1b18; padding: 3px 6px; border-radius: 50px !important; box-shadow: 0 4px 10px rgba(0,0,0,0.15); display: inline-flex; align-items: center; justify-content: center;">
        
        <style>
            /* Memaksa elemen NAV bawaan Laravel berbentuk bulat ramping */
            .pagination-wrapper nav {
                display: flex !important;
                align-items: center !important;
                justify-content: center !important;
                margin: 0 !important;
                padding: 0 !important;
                background: none !important;
                border: none !important;
                border-radius: 50px !important;
            }

            /* Tombol AKTIF (Bisa diklik) - Berbentuk Bulat Kapsul */
            .pagination-wrapper nav a {
                text-decoration: none;
                color: #ffffff !important; 
                font-weight: 600;
                font-size: 13px;
                padding: 6px 16px;
                border-radius: 50px !important; /* Membuat tombol di dalam jadi bulat lonjong */
                background-color: #2a2a24; 
                transition: all 0.2s ease-in-out;
                margin: 0 2px;
                display: inline-block !important;
            }

            /* Efek Hover Orange PasarOnline */
            .pagination-wrapper nav a:hover {
                background-color: #ff750f !important; 
                color: #ffffff !important;
                transform: translateY(-1px);
            }

            /* Tombol PASIF (Mati) - Berbentuk Bulat Kapsul Abu-abu */
            .pagination-wrapper nav span {
                color: #706f6c !important; 
                font-weight: 600;
                font-size: 13px;
                padding: 6px 16px;
                border-radius: 50px !important; /* Membuat tombol mati tetap bulat lonjong */
                cursor: not-allowed;
                margin: 0 2px;
                display: inline-block !important;
            }

            /* Blokir semua div penengah bawaan Laravel yang merusak kebulatan */
            .pagination-wrapper flex, 
            .pagination-wrapper div { 
                display: inline-flex !important; 
                padding: 0 !important; 
                margin: 0 !important; 
                background: none !important; 
                border: none !important;
                border-radius: 50px !important;
            }
            
            /* Sembunyikan elemen sampah bawaan Laravel */
            .pagination-wrapper svg { display: none !important; }
            .pagination-wrapper p { display: none !important; }
        </style>

        {{ $products->links() }}
        
    </div>
</div>

</x-layouts>