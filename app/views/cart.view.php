<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Cart</title>
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

    table {
        width: 100%;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.08);
        overflow: hidden;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    th {
        background: #0078ff;
        color: #fff;
        padding: 12px;
        text-align: left;
    }

    td {
        padding: 12px;
        border-bottom: 1px solid #eee;
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

    .checkout-btn {
        display: inline-block;
        background: #28a745;
        color: #fff;
        padding: 10px 18px;
        border-radius: 6px;
        margin-top: 20px;
        font-weight: 600;
    }

    .checkout-btn:hover {
        background: #1f7f35;
    }   
    </style>
</head>
<body>

<h1>Your Cart</h1>
<a href="catalog.php">Continue Shopping</a>
<hr>

<?php if (empty($totals['items'])): ?>
    <p>Your cart is empty.</p>
<?php else: ?>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Qty</th>
        <th>Cost Each</th>
        <th>Total</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($totals['items'] as $item): ?>
        <tr>
            <td><?= $item['id'] ?></td>
            <td><?= htmlspecialchars($item['name']) ?></td>
            <td><?= $item['qty'] ?></td>
            <td>$<?= number_format($item['cost'], 2) ?></td>
            <td>$<?= number_format($item['cost'] * $item['qty'], 2) ?></td>
            <td class="actions">
                <a href="cart.php?action=increase&id=<?= $item['id'] ?>">Increase</a>
                <a href="cart.php?action=decrease&id=<?= $item['id'] ?>">Decrease</a>
                <a href="cart.php?action=remove&id=<?= $item['id'] ?>">Remove</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<h3>Totals</h3>
<p><strong>Total Items:</strong> <?= $totals['totalQty'] ?></p>
<p><strong>Pre‑Tax Total:</strong> $<?= number_format($totals['preTaxTotal'], 2) ?></p>
<p><strong>Tax (5%):</strong> $<?= number_format($totals['tax'], 2) ?></p>
<p><strong>Shipping (10%):</strong> $<?= number_format($totals['shipping'], 2) ?></p>
<p><strong>Order Total:</strong> $<?= number_format($totals['orderTotal'], 2) ?></p>

<br>
<a href="cart.php?action=checkout" class="checkout-btn">Check Out</a>

<?php endif; ?>

</body>
</html>
