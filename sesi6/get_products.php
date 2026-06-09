<?php

header("Content-Type: application/json");

include 'koneksi.php';

$query = mysqli_query($conn, "SELECT * FROM products");

$data = [];

while($row = mysqli_fetch_assoc($query)){

    $data[] = [
        "id" => $row['id'],
        "nama" => $row['nama_produk'],
        "harga" => (int)$row['harga'],
        "deskripsi" => $row['deskripsi'],
        "gambar" => $row['gambar'],
        "kategori" => $row['kategori']
    ];
}

echo json_encode($data);

?>