<?php
$dsn = 'mysql:host=localhost;dbname=crud_example';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password); //membuat koneksi ke database
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //menangani kesalahan
    echo "Koneksi berhasil!";
} catch (PDOException $e) { //kalo gagal 
    echo "Koneksi gagal: " . $e->getMessage();
}
