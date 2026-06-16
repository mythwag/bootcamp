<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola List Produk') }}
        </h2>
    </x-slot>

    <div class="py-12" style="font-family: sans-serif;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div class="mb-4 flex justify-between items-center">
                    <p class="text-gray-600">Gudang penyimpanan data katalog produk PasarOnline.</p>
                    <a href="#" style="background-color: #4CAF50; color: white; padding: 8px 16px; border-radius: 6px; font-weight: bold; text-decoration: none; font-size: 14px;">
                        + Tambah Produk
                    </a>
                </div>

                <div style="overflow-x: auto;">
                    <table style="width: 100%; border-collapse: collapse; text-align: left;">
                        <thead>
                            <tr style="background-color: #1b1b18; color: white;">
                                <th style="padding: 12px; border-radius: 6px 0 0 0;">ID</th>
                                <th style="padding: 12px;">Gambar</th>
                                <th style="padding: 12px;">Nama Produk</th>
                                <th style="padding: 12px;">Deskripsi</th>
                                <th style="padding: 12px;">Stok</th>
                                <th style="padding: 12px;">Harga</th>
                                <th style="padding: 12px; border-radius: 0 6px 0 0; text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $product)
                                <tr style="border-bottom: 1px solid #eee;">
                                    <td style="padding: 12px; font-weight: bold; color: #666;">#{{ $product->id }}</td>
                                    <td style="padding: 12px;">
                                        <div style="width: 50px; height: 50px; background: #f5f5f5; border-radius: 6px; display: flex; align-items: center; justify-content: center; font-size: 11px; color: #999;">
                                            🖼️ Mini
                                        </div>
                                    </td>
                                    <td style="padding: 12px; font-weight: 600;">{{ $product->name }}</td>
                                    <td style="padding: 12px; color: #555; font-size: 14px; max-width: 250px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                        {{ $product->description ?? '-' }}
                                    </td>
                                    <td style="padding: 12px; font-weight: bold;">{{ $product->stock }} pcs</td>
                                    <td style="padding: 12px; color: #ff750f; font-weight: bold;">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                    <td style="padding: 12px; text-align: center;">
                                        <a href="#" style="color: #4CAF50; font-weight: 600; text-decoration: none; margin-right: 12px; font-size: 14px;">Edit</a>
                                        <a href="#" style="color: #e53935; font-weight: 600; text-decoration: none; font-size: 14px;">Hapus</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" style="padding: 20px; text-align: center; color: #999; font-style: italic;">Belum ada data produk.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>