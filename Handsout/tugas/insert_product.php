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
    $name = "Ipad";
    $price = 18000.00;

    // Query untuk memasukkan data - prepared statements
    $sql = "INSERT INTO products (name, price) VALUES (:name, :price)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':price', $price);

    // Eksekusi query
    if ($stmt->execute()) {
        echo "Data berhasil ditambahkan!";
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }
} catch (PDOException $e) {
    // Menangani kesalahan
    echo "Koneksi atau query gagal: " . $e->getMessage();
}
