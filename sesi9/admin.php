<?php
include 'koneksi.php';

// --- 1. FITUR TAMBAH PRODUK (CREATE) ---
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $gambar = $_POST['gambar'];
    $kategori = $_POST['kategori'];

    $query = "INSERT INTO products (nama, harga, deskripsi, gambar, kategori) VALUES ('$nama', '$harga', '$deskripsi', '$gambar', '$kategori')";
    mysqli_query($conn, $query);
    header("Location: admin.php");
}

// --- 2. FITUR HAPUS PRODUK (DELETE) ---
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM products WHERE id = $id");
    header("Location: admin.php");
}

// --- 3. FITUR AMBIL DATA UNTUK EDIT (PRE-UPDATE) ---
$edit_data = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $res = mysqli_query($conn, "SELECT * FROM products WHERE id = $id");
    $edit_data = mysqli_fetch_assoc($res);
}

// --- 4. FITUR SIMPAN PERUBAHAN (UPDATE) ---
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $gambar = $_POST['gambar'];
    $kategori = $_POST['kategori'];

    $query = "UPDATE products SET nama='$nama', harga='$harga', deskripsi='$deskripsi', gambar='$gambar', kategori='$kategori' WHERE id=$id";
    mysqli_query($conn, $query);
    header("Location: admin.php");
}

// Ambil semua data produk untuk tabel (READ)
$all_products = mysqli_query($conn, "SELECT * FROM products ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Griya Artisan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-light p-4">
<div class="container" style="max-width: 900px;">
    <h2 class="mb-4 fw-bold text-center">Dashboard Management Produk</h2>

    <div class="card p-4 mb-5 shadow-sm border-0 rounded-3">
        <h5 class="fw-bold mb-3 text-secondary"><?= $edit_data ? '📝 Edit Produk' : '✨ Tambah Produk Baru' ?></h5>
        <form action="admin.php" method="POST" class="row g-3">
            <?php if ($edit_data): ?>
                <input type="hidden" name="id" value="<?= $edit_data['id'] ?>">
            <?php endif; ?>
            
            <div class="col-md-6">
                <label class="form-label small fw-medium text-muted">Nama Produk</label>
                <input type="text" name="nama" class="form-control" value="<?= $edit_data['nama'] ?? '' ?>" required>
            </div>
            <div class="col-md-6">
                <label class="form-label small fw-medium text-muted">Harga (Rupiah)</label>
                <input type="number" name="harga" class="form-control" value="<?= $edit_data['harga'] ?? '' ?>" required>
            </div>
            <div class="col-md-4">
                <label class="form-label small fw-medium text-muted">Kategori</label>
                <select name="kategori" class="form-select">
                    <option value="Minuman" <?= (isset($edit_data) && $edit_data['kategori'] == 'Minuman') ? 'selected' : '' ?>>Minuman</option>
                    <option value="Makanan" <?= (isset($edit_data) && $edit_data['kategori'] == 'Makanan') ? 'selected' : '' ?>>Makanan</option>
                    <option value="Kesenian" <?= (isset($edit_data) && $edit_data['kategori'] == 'Kesenian') ? 'selected' : '' ?>>Kesenian</option>
                    <option value="Digital" <?= (isset($edit_data) && $edit_data['kategori'] == 'Digital') ? 'selected' : '' ?>>Digital</option>
                </select>
            </div>
            <div class="col-md-8">
                <label class="form-label small fw-medium text-muted">URL Link Gambar</label>
                <input type="text" name="gambar" class="form-control" value="<?= $edit_data['gambar'] ?? '' ?>" required>
            </div>
            <div class="col-12">
                <label class="form-label small fw-medium text-muted">Deskripsi Produk</label>
                <textarea name="deskripsi" class="form-control" rows="3" required><?= $edit_data['deskripsi'] ?? '' ?></textarea>
            </div>
            <div class="col-12 mt-4">
                <?php if ($edit_data): ?>
                    <button type="submit" name="update" class="btn btn-warning px-4 text-white">Simpan Perubahan</button>
                    <a href="admin.php" class="btn btn-secondary px-4">Batal</a>
                <?php else: ?>
                    <button type="submit" name="tambah" class="btn btn-primary px-4" style="background-color: #5e17eb; border: none;">Tambah Produk</button>
                <?php endif; ?>
            </div>
        </form>
    </div>

    <div class="card p-4 shadow-sm border-0 rounded-3">
        <h5 class="fw-bold mb-3 text-secondary">📦 Daftar Produk Terdaftar</h5>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($all_products)): ?>
                    <tr>
                        <td><img src="<?= $row['gambar'] ?>" width="55" height="45" class="object-fit-cover rounded"></td>
                        <td><strong><?= $row['nama'] ?></strong></td>
                        <td><span class="badge bg-secondary-subtle text-secondary px-2.5 py-1.5"><?= $row['kategori'] ?></span></td>
                        <td>Rp <?= number_format($row['harga'], 0, ',', '.') ?></td>
                        <td>
                            <a href="admin.php?edit=<?= $row['id'] ?>" class="btn btn-sm btn-outline-warning me-1">Edit</a>
                            <a href="admin.php?hapus=<?= $row['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus produk ini?')">Hapus</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>