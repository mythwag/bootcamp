<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 1. Inisialisasi variabel dan bersihkan input teks (Sanitasi)
    $nama_produk = htmlspecialchars(trim($_POST['nama_produk']));
    $kategori    = htmlspecialchars(trim($_POST['kategori']));
    $deskripsi   = htmlspecialchars(trim($_POST['deskripsi']));
    
    $errors = [];

    // 2. Validasi Input Teks
    if (empty($nama_produk) || strlen($nama_produk) < 3) {
        $errors[] = "Nama produk wajib diisi dan minimal 3 karakter.";
    }

    if (empty($kategori)) {
        $errors[] = "Kategori produk wajib dipilih.";
    }

    if (empty($deskripsi) || strlen($deskripsi) < 10) {
        $errors[] = "Deskripsi produk wajib diisi dan minimal 10 karakter.";
    }

    // 3. Validasi File Gambar
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
        $file_name = $_FILES['gambar']['name'];
        $file_size = $_FILES['gambar']['size'];
        $file_tmp  = $_FILES['gambar']['tmp_name'];
        
        $file_ext  = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $allowed_ext = ['jpg', 'jpeg', 'png'];
        $max_size  = 2 * 1024 * 1024; // 2MB

        // Cek Ekstensi
        if (!in_array($file_ext, $allowed_ext)) {
            $errors[] = "Ekstensi gambar tidak diizinkan. Hanya JPG, JPEG, dan PNG.";
        }

        // Cek Ukuran File
        if ($file_size > $max_size) {
            $errors[] = "Ukuran gambar terlalu besar. Maksimal 2MB.";
        }
    } else {
        $errors[] = "Wajib mengunggah gambar produk.";
    }

    // 4. Penanganan Hasil Validasi
    if (empty($errors)) {
        // Jika validasi lolos, sistem siap memindahkan gambar dan menyimpan ke database
        
        // Contoh penamaan ulang file agar unik:
        $nama_gambar_baru = time() . '_' . uniqid() . '.' . $file_ext;
        $target_dir = "uploads/";
        
        // Membuat folder 'uploads' secara otomatis jika belum ada
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0755, true);
        }

        if (move_uploaded_file($file_tmp, $target_dir . $nama_gambar_baru)) {
            // DI SINI: Tempat Anda memasukkan query INSERT ke database (MySQL/PDO)
            
            echo "<div style='font-family: Arial, sans-serif; padding: 20px; max-width: 600px; margin: 50px auto; border: 1px solid #d4edda; background: #d4edda; color: #155724; border-radius: 5px;'>";
            echo "<h3>🎉 Produk Berhasil Disimpan!</h3>";
            echo "<ul>";
            echo "<li><strong>Nama:</strong> $nama_produk</li>";
            echo "<li><strong>Kategori:</strong> $kategori</li>";
            echo "<li><strong>Deskripsi:</strong> $deskripsi</li>";
            echo "<li><strong>Gambar:</strong> <a href='$target_dir$nama_gambar_baru' target='_blank'>$nama_gambar_baru</a></li>";
            echo "</ul>";
            echo "<a href='input-produk.php' style='display:inline-block; margin-top:10px; color:#155724; font-weight:bold;'>&larr; Kembali</a>";
            echo "</div>";
        } else {
            echo "Gagal mengunggah gambar ke server.";
        }

    } else {
        // Jika ada error pada validasi PHP
        echo "<div style='font-family: Arial, sans-serif; padding: 20px; max-width: 600px; margin: 50px auto; border: 1px solid #f8d7da; background: #f8d7da; color: #721c24; border-radius: 5px;'>";
        echo "<h3>⚠️ Terjadi Kesalahan Validasi:</h3>";
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
        echo "<a href='javascript:history.back()' style='display:inline-block; margin-top:10px; color:#721c24; font-weight:bold;'>&larr; Perbaiki Data</a>";
        echo "</div>";
    }
} else {
    // Jika file diakses langsung tanpa POST
    header("Location: input-produk.php");
    exit();
}
?>