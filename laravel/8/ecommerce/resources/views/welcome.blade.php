<x-layouts>
    <!-- Mengatur Judul Halaman di Tab Browser -->
    <x-slot:title>Selamat Datang - PasarOnline</x-slot:title>

    <!-- Konten Utama Halaman Beranda -->
    <div style="text-align: center; padding: 60px 20px; background: white; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); margin-top: 20px;">
        <h1 style="font-size: 36px; color: #333; margin-bottom: 15px; font-weight: bold;">
            Selamat Datang di PasarOnline!
        </h1>
        
        <p style="font-size: 18px; color: #666; max-width: 600px; margin: 0 auto 30px auto; line-height: 1.6;">
            Temukan berbagai macam produk lokal pilihan dan kebutuhan harian Anda dengan pengalaman belanja yang mudah, cepat, dan aman.
        </p>
        
        <!-- Tombol Aksi Menuju Katalog Produk -->
        <a href="{{ url('/products') }}" class="btn" style="font-size: 16px; padding: 12px 30px; text-decoration: none; font-weight: bold;">
            Mulai Jelajahi Produk &rarr;
        </a>
    </div>

    <!-- Section Tambahan: Fitur Keunggulan Toko (Opsional/Pemanis) -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px; margin-top: 40px;">
        <div style="background: white; padding: 20px; border-radius: 8px; text-align: center; box-shadow: 0 2px 5px rgba(0,0,0,0.02);">
            <h3 style="color: #4CAF50; margin-bottom: 10px;">🚚 Pengiriman Cepat</h3>
            <p style="color: #777; font-size: 14px; margin: 0;">Barang Anda akan dikirim dengan kurir ekspres langsung ke rumah.</p>
        </div>
        <div style="background: white; padding: 20px; border-radius: 8px; text-align: center; box-shadow: 0 2px 5px rgba(0,0,0,0.02);">
            <h3 style="color: #4CAF50; margin-bottom: 10px;">🛡️ Garansi Aman</h3>
            <p style="color: #777; font-size: 14px; margin: 0;">Uang kembali 100% jika produk yang diterima rusak atau tidak sesuai.</p>
        </div>
        <div style="background: white; padding: 20px; border-radius: 8px; text-align: center; box-shadow: 0 2px 5px rgba(0,0,0,0.02);">
            <h3 style="color: #4CAF50; margin-bottom: 10px;">⭐ Kualitas Terbaik</h3>
            <p style="color: #777; font-size: 14px; margin: 0;">Kami hanya menyediakan produk original dan terjamin mutunya.</p>
        </div>
    </div>
</x-layouts>