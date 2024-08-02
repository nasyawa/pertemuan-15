<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") { //Mengecek apakah form dikirim menggunakan metode POST.
    // Mengambil data dari form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // SQL untuk memasukkan data ke tabel users
    $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";

    // Mempersiapkan statement - Menyiapkan query SQL dengan parameter placeholder.
    $stmt = $pdo->prepare($sql);

    // Mengikat parameter ke query.
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);

    // Mengeksekusi statement dan mengecek apakah berhasil
    if ($stmt->execute()) {
        echo "Data berhasil ditambahkan.";
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }
}
?>

<!-- Form HTML -->
<form method="POST" action="">
    Nama: <input type="text" name="name" required><br>
    Email: <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>
    <input type="submit" value="Tambah">
</form>