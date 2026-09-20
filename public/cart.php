<?php
session_start();
require_once "../config/db.php";

?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Cart</title>
</head>
<body>

<h1>Your Cart</h1>

<?php
if (empty($_SESSION['cart'])) {
    echo "<p>Your cart is empty.</p>";
} else {
    foreach ($_SESSION['cart'] as $id => $qty) {

        $sql = "SELECT * FROM products WHERE id = $id";
        $result = $conn->query($sql);
        $product = $result->fetch_assoc();

        echo "<div style='margin-bottom:20px;'>";
        echo "<strong>Name:</strong> " . $product['name'] . "<br>";
        echo "<strong>Quantity:</strong> " . $qty . "<br>";
        echo "<strong>Cost:</strong> $" . $product['price'] . "<br>";
        echo "<strong>Total:</strong> $" . ($product['price'] * $qty) . "<br>";
        echo "</div>";
    }
}
?>

<br>
<a href="catalog.php">Back to Catalog</a>

</body>
</html>
