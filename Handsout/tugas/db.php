<?php
$dsn = 'mysql:host=localhost;dbname=my_database';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password); //membuat koneksi ke database
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //menangani kesalahan
    echo "Koneksi berhasil!";

    // Query untuk membuat tabel
    $sql = "CREATE TABLE IF NOT EXISTS products (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        price FLOAT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    // Eksekusi query
    $pdo->exec($sql);
    echo "Tabel 'products' berhasil dibuat!";
} catch (PDOException $e) { //kalo gagal 
    echo "Koneksi gagal: " . $e->getMessage();
}
