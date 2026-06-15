<x-layouts>
    <x-slot:title>Daftar Produk Nyata</x-slot:title>

    <h1>Semua Produk Kamі</h1>
    <p>Pilih produk favorit Anda dari katalog kami di bawah ini:</p>

    <div class="grid-produk">
        @forelse($products as $product)
            <div class="card">
                <h3>{{ $product->name }}</h3>
                <p style="color: #666; font-size: 14px;">{{ $product->description ?? 'Tidak ada deskripsi.' }}</p>
                <p style="font-weight: bold; color: #4CAF50; font-size: 18px;">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                <p style="font-size: 12px; color: #999;">Stok: {{ $product->stock }} pcs</p>
                <a href="#" class="btn">+ Keranjang</a>
            </div>
        @empty
            <p style="grid-column: 1/-1; text-align: center; font-style: italic; color: #888;">Belum ada produk yang dijual saat ini.</p>
        @endforelse
    </div>
</x-layouts>