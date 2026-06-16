<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Kategori Baru
        </h2>
    </x-slot>

    <div class="py-12" style="font-family: sans-serif;">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('product-category.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-bold mb-2">Nama Kategori</label>
                        <input type="text" name="name" id="name" required class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>

                    <div class="flex justify-end gap-2">
                        <a href="{{ route('categories.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md text-decoration-none text-sm font-semibold">Batal</a>
                        <button type="submit" style="background-color: #4CAF50;" class="px-4 py-2 text-white rounded-md text-sm font-semibold">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>