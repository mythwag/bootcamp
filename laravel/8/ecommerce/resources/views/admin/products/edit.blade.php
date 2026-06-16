<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Data Produk
        </h2>
    </x-slot>

    <div class="py-12" style="font-family: sans-serif;">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('products.update', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-bold mb-2">Nama Produk</label>
                        <input type="text" name="name" id="name" value="{{ $product->name }}" required class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>

                    <div class="mb-4">
                        <label for="category_id" class="block text-gray-700 font-bold mb-2">Kategori Produk</label>
                        <select name="category_id" id="category_id" required class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 font-bold mb-2">Deskripsi</label>
                        <textarea name="description" id="description" rows="3" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">{{ $product->description }}</textarea>
                    </div>

                    <div class="mb-4 flex gap-4">
                        <div class="w-1/2">
                            <label for="price" class="block text-gray-700 font-bold mb-2">Harga (Rp)</label>
                            <input type="number" name="price" id="price" value="{{ $product->price }}" required class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>
                        <div class="w-1/2">
                            <label for="stock" class="block text-gray-700 font-bold mb-2">Stok Barang</label>
                            <input type="number" name="stock" id="stock" value="{{ $product->stock }}" required class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Nama File Gambar</label>
                        <input type="text" name="image" value="{{ $product->image }}" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>

                    <div class="flex justify-end gap-2">
                        <a href="{{ route('products.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md text-decoration-none text-sm font-semibold">Batal</a>
                        <button type="submit" style="background-color: #4CAF50;" class="px-4 py-2 text-white rounded-md text-sm font-semibold">Perbarui Produk</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>