<?php
require 'db.php'; // File ini harus berisi kode koneksi ke database

// ID produk yang akan diperbarui dan harga baru
$id = 4;
$new_price = 20500.00;

// Query untuk memperbarui data
$sql = "UPDATE products SET price = :price WHERE id = :id";
$stmt = $pdo->prepare($sql);

// Eksekusi query dengan parameter
$stmt->execute(['price' => $new_price, 'id' => $id]);

echo "Data berhasil diperbarui!";
