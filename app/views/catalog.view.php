<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Snack Shop Catalog</title>
    <style>
        body {
        font-family: 'Segoe UI', Arial, sans-serif;
        background: #fafafa;
        margin: 0;
        padding: 20px;
        color: #333;
    }

    h1 {
        text-align: center;
        margin-bottom: 30px;
        color: #444;
    }

    a {
        text-decoration: none;
        color: #0078ff;
        font-weight: 600;
    }

    a:hover {
        color: #005fcc;
    }

    .product {
        background: #fff;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 15px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.08);
    }

    .product h2 {
        margin-top: 0;
        color: #222;
    }

    .actions a {
        display: inline-block;
        background: #0078ff;
        color: #fff;
        padding: 6px 12px;
        border-radius: 6px;
        margin-right: 8px;
        font-size: 14px;
    }

    .actions a:hover {
        background: #005fcc;
    }
    </style>
</head>
<body>

<h1>Snack Shop Catalog</h1>
<a href="cart.php">View Cart</a>
<hr>

<?php foreach ($products as $p): ?>
    <div class="product">
        <h2><?= htmlspecialchars($p['name']) ?></h2>
        <p><strong>ID:</strong> <?= $p['id'] ?></p>
        <p><strong>Description:</strong> <?= htmlspecialchars($p['description']) ?></p>
        <p><strong>Cost:</strong> $<?= number_format($p['cost'], 2) ?></p>

        <p><strong>Quantity in Cart:</strong>
            <?= isset($_SESSION['cart'][$p['id']]) ? $_SESSION['cart'][$p['id']]['qty'] : 0 ?>
        </p>

        <div class="actions">
            <a href="catalog.php?action=add&id=<?= $p['id'] ?>">Add</a>
            <a href="catalog.php?action=increase&id=<?= $p['id'] ?>">Increase</a>
            <a href="catalog.php?action=decrease&id=<?= $p['id'] ?>">Decrease</a>
            <a href="catalog.php?action=remove&id=<?= $p['id'] ?>">Remove</a>
        </div>
    </div>
<?php endforeach; ?>

</body>
</html>
