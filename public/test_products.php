<?php
require_once "../config/db.php";

$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Products Loaded Successfully:</h2>";
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " | ";
        echo "Name: " . $row["name"] . " | ";
        echo "Price: $" . $row["price"] . "<br>";
    }
} else {
    echo "No products found.";
}
?>
