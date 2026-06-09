<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "griya_artisan";

$conn = mysqli_connect(
    $host,
    $user,
    $password,
    $database
);

if (!$conn) {
    die("Koneksi gagal");
}
?>