<?php
// Koneksi ke database
$dsn = 'mysql:host=localhost;dbname=my_database';
$username = 'root';
$password = '';

try {
    // Membuat koneksi ke database
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Koneksi berhasil!<br>";

    // Data yang akan dimasukkan
    $name = "Laptop";
    $price = 15000.00;

    // Membuat query SQL
    $sql = "INSERT INTO products (name, price) VALUES ('$name', $price)";

    // Eksekusi query
    if ($pdo->exec($sql)) {
        echo "Data berhasil ditambahkan!";
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }
} catch (PDOException $e) {
    // Menangani kesalahan
    echo "Koneksi atau query gagal: " . $e->getMessage();
}
