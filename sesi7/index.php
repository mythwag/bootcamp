<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Produk Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Form Tambah Produk</h4>
                </div>
                <div class="card-body p-4">
                    
                    <form action="proses-input.php" method="POST" enctype="multipart/form-data" id="productForm" class="needs-validation" novalidate>
                        
                        <div class="mb-3">
                            <label for="nama_produk" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" id="nama_produk" name="nama_produk" required minlength="3">
                            <div class="invalid-feedback">
                                Nama produk wajib diisi (minimal 3 karakter).
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select class="form-select" id="kategori" name="kategori" required>
                                <option value="" selected disabled>Pilih Kategori...</option>
                                <option value="Makanan">Makanan</option>
                                <option value="Minuman">Minuman</option>
                                <option value="Pakaian">Pakaian</option>
                                <option value="Elektronik">Elektronik</option>
                            </select>
                            <div class="invalid-feedback">
                                Silakan pilih kategori produk.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi Produk</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required minlength="10"></textarea>
                            <div class="invalid-feedback">
                                Deskripsi wajib diisi (minimal 10 karakter).
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="gambar" class="form-label">Gambar Produk (Format: JPG/JPEG/PNG, Maks: 2MB)</label>
                            <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" required>
                            <div class="invalid-feedback" id="gambarFeedback">
                                Silakan unggah gambar produk yang valid.
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Simpan Produk</button>
                        </div>

                    </form>
                    </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
(() => {
    'use strict'

    const form = document.getElementById('productForm');
    const gambarInput = document.getElementById('gambar');
    const gambarFeedback = document.getElementById('gambarFeedback');

    form.addEventListener('submit', event => {
        let isValid = true;

        // Validasi Kustom untuk Gambar (Ukuran & Tipe) via JS
        if (gambarInput.files.length > 0) {
            const file = gambarInput.files[0];
            const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];
            const maxSize = 2 * 1024 * 1024; // 2MB

            if (!allowedTypes.includes(file.type)) {
                gambarFeedback.textContent = 'Format file harus JPG, JPEG, atau PNG.';
                gambarInput.setCustomValidity('Format salah');
                isValid = false;
            } else if (file.size > maxSize) {
                gambarFeedback.textContent = 'Ukuran file maksimal adalah 2MB.';
                gambarInput.setCustomValidity('File terlalu besar');
                isValid = false;
            } else {
                gambarInput.setCustomValidity('');
            }
        }

        // Cek validasi Bootstrap dasar
        if (!form.checkValidity() || !isValid) {
            event.preventDefault();
            event.stopPropagation();
        }

        form.classList.add('was-validated');
    }, false);

    // Reset validasi gambar saat user memilih file baru
    gambarInput.addEventListener('change', () => {
        gambarInput.setCustomValidity('');
        gambarFeedback.textContent = 'Silakan unggah gambar produk yang valid.';
    });
})()
</script>
</body>
</html>