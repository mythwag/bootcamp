<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['cart'])) { $_SESSION['cart'] = []; }

$input = json_decode(file_get_contents('php://input'), true);

if (isset($input['action']) && $input['action'] == 'add') {
    $product_id = (int)$input['product_id'];

    $query = mysqli_query($conn, "SELECT * FROM products WHERE id = $product_id");
    $product = mysqli_fetch_assoc($query);

    if ($product) {
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id]['qty'] += 1;
        } else {
            $_SESSION['cart'][$product_id] = [
                'nama' => $product['nama'],
                'harga' => (int)$product['harga'],
                'gambar' => $product['gambar'],
                'qty' => 1
            ];
        }

        $total_items = 0;
        foreach ($_SESSION['cart'] as $item) { $total_items += $item['qty']; }

        echo json_encode([
            'status' => 'success', 
            'message' => 'Produk berhasil ditambahkan ke keranjang belanja!',
            'total_items' => $total_items
        ]);
        exit;
    }
}
echo json_encode(['status' => 'error', 'message' => 'Gagal memproses permintaan']);
?>