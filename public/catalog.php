<?php
session_start();
require_once "../config/db.php";

// Initialize cart if not created
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle cart actions
if (isset($_GET['action']) && isset($_GET['id'])) {
    $id = $_GET['id'];

    switch ($_GET['action']) {
        case 'add':
            $_SESSION['cart'][$id] = ($_SESSION['cart'][$id] ?? 0) + 1;
            break;

        case 'remove':
            unset($_SESSION['cart'][$id]);
            break;

        case 'inc':
            $_SESSION['cart'][$id]++;
            break;

        case 'dec':
            $_SESSION['cart'][$id] = max(0, $_SESSION['cart'][$id] - 1);
            if ($_SESSION['cart'][$id] == 0) {
                unset($_SESSION['cart'][$id]);
            }
            break;
    }

    header("Location: catalog.php");
    exit;
}

// Load products
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Catalog</title>
</head>
<body>

<h1>Product Catalog</h1>

<?php while($row = $result->fetch_assoc()): ?>
    <div style="margin-bottom:20px; border-bottom:1px solid #ccc; padding-bottom:10px;">
        <strong>ID:</strong> <?= $row['id'] ?><br>
        <strong>Name:</strong> <?= $row['name'] ?><br>
        <strong>Description:</strong> <?= $row['description'] ?><br>
        <strong>Cost:</strong> $<?= $row['price'] ?><br>

        <strong>Quantity in Cart:</strong>
        <?= $_SESSION['cart'][$row['id']] ?? 0 ?><br><br>

        <a href="catalog.php?action=add&id=<?= $row['id'] ?>">Add</a> |
        <a href="catalog.php?action=remove&id=<?= $row['id'] ?>">Remove</a> |
        <a href="catalog.php?action=inc&id=<?= $row['id'] ?>">+</a> |
        <a href="catalog.php?action=dec&id=<?= $row['id'] ?>">-</a>
    </div>
<?php endwhile; ?>

<br>
<a href="cart.php">Go to Cart</a>

</body>
</html>
