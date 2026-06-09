<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "ecomm";

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