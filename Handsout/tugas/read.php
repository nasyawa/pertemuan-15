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

    // Query untuk membaca data
    $sql = "SELECT name, price FROM products";
    $stmt = $pdo->query($sql);

    // Menampilkan data dalam bentuk tabel HTML
    echo "<table border='1'>";
    echo "<tr><th>Name</th><th>Price</th></tr>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['price']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";

} catch (PDOException $e) {
    // Menangani kesalahan
    echo "Koneksi atau query gagal: " . $e->getMessage();
}
?>
