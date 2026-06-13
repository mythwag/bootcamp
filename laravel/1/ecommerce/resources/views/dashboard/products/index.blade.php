<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk - E-Commerce</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background-color: #f9f9f9; }
        h1 { color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; background: #fff; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #4CAF50; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        .no-data { text-align: center; font-style: italic; color: #888; }
    </style>
</head>
<body>

    <h1>Daftar Produk Toko Online</h1>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Stok</th>
            </tr>
        </thead>
        <tbody>
            {{-- Cek apakah ada produk di database --}}
            @forelse($products as $key => $product)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description ?? '-' }}</td>
                    <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                    <td>{{ $product->stock }} pcs</td>
                </tr>
            @empty
                {{-- Jika database masih kosong, tampilkan pesan ini --}}
                <tr>
                    <td colspan="5" class="no-data">Belum ada produk yang tersedia.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>