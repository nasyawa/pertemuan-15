<?php
require 'db.php';
$id = 4; // ID produk yang akan dihapus

$sql = "DELETE FROM products WHERE id = :id";
$stmt = $pdo->prepare($sql);

$stmt->execute(['id' => $id]);
echo "Produk berhasil dihapus!";
