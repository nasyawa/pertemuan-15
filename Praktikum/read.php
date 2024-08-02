<?php
include 'db.php';

$sql = "SELECT id, name, email FROM users";
$stmt = $pdo->query($sql); //Menjalankan query SQL dan menyimpan hasilnya dalam objek $stmt.

if ($stmt->rowCount() > 0) { //Memeriksa apakah jumlah baris yang dikembalikan lebih dari 0.
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "ID: " . $row["id"] . " - Nama: " . $row["name"] . " - Email: " . $row["email"] . "<br>";
    }
} else {
    echo "0 results";
}
