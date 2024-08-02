<?php
require 'db.php';

$min_price = 0; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $min_price = $_POST['min_price']; // Ambil nilai harga minimum dari form input

    $sql = "SELECT id, name, price FROM products WHERE price > :min_price";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['min_price' => $min_price]);

    if ($stmt->rowCount() > 0) {
        echo "<table border='1'>
                <tr><th>ID</th><th>Name</th><th>Price</th></tr>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['price']) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Tidak ada produk dengan harga di atas " . htmlspecialchars($min_price);
    }
}
?>

<form method="POST" action="">
    Harga minimum: <input type="number" name="min_price" required>
    <input type="submit" value="Filter Produk">
</form>