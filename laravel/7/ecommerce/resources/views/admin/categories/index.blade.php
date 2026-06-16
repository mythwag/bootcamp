<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Kelola Kategori Produk
        </h2>
    </x-slot>

    <div class="py-12" style="font-family: sans-serif;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div class="mb-4 flex justify-between items-center">
                    <p class="text-gray-600">Daftar kategori aktif toko PasarOnline Anda.</p>
                    <a href="{{ route('categories.create') }}" style="background-color: #4CAF50; color: white; padding: 8px 16px; border-radius: 6px; font-weight: bold; text-decoration: none; font-size: 14px;">
                    + Tambah Kategori
                    </a>
                    <td style="padding: 12px; text-align: center;">
                        <a href="{{ route('categories.edit', $category->id) }}" style="color: #4CAF50; font-weight: 600; text-decoration: none; margin-right: 15px; font-size: 14px;">Edit</a>
                        
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="color: #e53935; font-weight: 600; background: none; border: none; padding: 0; font-size: 14px; cursor: pointer;">Hapus</button>
                        </form>
                    </td>
                </div>

                <table style="width: 100%; border-collapse: collapse; margin-top: 10px; text-align: left;">
                    <thead>
                        <tr style="background-color: #1b1b18; color: white;">
                            <th style="padding: 12px; border-radius: 6px 0 0 0;">ID</th>
                            <th style="padding: 12px;">Nama Kategori</th>
                            <th style="padding: 12px;">Jumlah Produk</th>
                            <th style="padding: 12px; border-radius: 0 6px 0 0; text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $category)
                            <tr style="border-bottom: 1px solid #eee;">
                                <td style="padding: 12px; font-weight: bold; color: #666;">#{{ $category->id }}</td>
                                <td style="padding: 12px; font-weight: 600;">{{ $category->name }}</td>
                                <td style="padding: 12px;">
                                    <span style="background-color: #e8f5e9; color: #2e7d32; padding: 3px 10px; border-radius: 12px; font-size: 13px; font-weight: bold;">
                                        {{ $category->products_count }} Produk
                                    </span>
                                </td>
                                <td style="padding: 12px; text-align: center;">
                                    <a href="#" style="color: #4CAF50; font-weight: 600; text-decoration: none; margin-right: 15px; font-size: 14px;">Edit</a>
                                    <a href="#" style="color: #e53935; font-weight: 600; text-decoration: none; font-size: 14px;">Hapus</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" style="padding: 20px; text-align: center; color: #999; font-style: italic;">Belum ada data kategori.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>