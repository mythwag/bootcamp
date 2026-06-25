<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Produk Baru
        </h2>
    </x-slot>

    <div class="py-12" style="font-family: sans-serif;">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('product.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-bold mb-2">Nama Produk</label>
                        <input type="text" name="name" id="name" required class="w-full px-3 py-2 border rounded-md">
                    </div>

                    <div class="mb-4">
                        <label for="category_id" class="block text-gray-700 font-bold mb-2">Kategori Produk</label>
                        <select name="category_id" id="category_id" required class="w-full px-3 py-2 border rounded-md">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="price" class="block text-gray-700 font-bold mb-2">Harga (Rp)</label>
                        <input type="number" name="price" id="price" required class="w-full px-3 py-2 border rounded-md">
                    </div>

                    <div class="mb-4">
                        <label for="stock" class="block text-gray-700 font-bold mb-2">Stok Barang</label>
                        <input type="number" name="stock" id="stock" required class="w-full px-3 py-2 border rounded-md">
                    </div>

                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Simpan Produk</button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>