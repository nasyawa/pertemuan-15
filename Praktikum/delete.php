<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id']; // Mengambil nilai ID dari form yang dikirimkan.

    $sql = "DELETE FROM users WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo "Data berhasil dihapus.";
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }
}
?>

<form method="POST" action="">
    ID: <input type="number" name="id" required><br>
    <input type="submit" value="Delete">
</form>