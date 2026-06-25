<x-layouts>
    <x-slot:title>Keranjang Belanja Anda</x-slot:title>

    <h1>Keranjang Belanja</h1>
    <p>Berikut adalah barang-barang siap beli yang sudah Anda pilih:</p>

    <table>
        <thead>
            <tr>
                <th>Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Kopi Matcha Premium</td>
                <td>Rp 45.000</td>
                <td>2</td>
                <td>Rp 90.000</td>
            </tr>
        </tbody>
    </table>

    <div style="text-align: right; margin-top: 30px;">
        <h3 style="margin-bottom: 20px;">Total Pembayaran: Rp 90.000</h3>
        <a href="{{ url('/checkout') }}" class="btn" style="background-color: #333;">Lanjut ke Checkout &rarr;</a>
    </div>
</x-layouts>