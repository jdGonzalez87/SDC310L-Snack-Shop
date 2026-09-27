<?php

class CartModel
{
    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    }

    // Add product to cart
    public function add($product)
    {
        $id = $product['id'];

        if (!isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id] = [
                'id' => $product['id'],
                'name' => $product['name'],
                'cost' => $product['cost'],
                'qty' => 1
            ];
        } else {
            $_SESSION['cart'][$id]['qty']++;
        }
    }

    // Remove product completely
    public function remove($id)
    {
        if (isset($_SESSION['cart'][$id])) {
            unset($_SESSION['cart'][$id]);
        }
    }

    // Increase quantity
    public function increase($id)
    {
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['qty']++;
        }
    }

    // Decrease quantity
    public function decrease($id)
    {
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['qty']--;

            if ($_SESSION['cart'][$id]['qty'] <= 0) {
                unset($_SESSION['cart'][$id]);
            }
        }
    }

    // Get all cart items
    public function getItems()
    {
        return $_SESSION['cart'];
    }

    // Clear cart
    public function clear()
    {
        $_SESSION['cart'] = [];
    }

    // Calculate totals
    public function calculateTotals()
    {
        $items = $_SESSION['cart'];

        $preTaxTotal = 0;
        $totalQty = 0;

        foreach ($items as $item) {
            $preTaxTotal += $item['cost'] * $item['qty'];
            $totalQty += $item['qty'];
        }

        $tax = $preTaxTotal * 0.05;        // 5% tax
        $shipping = $preTaxTotal * 0.10;   // 10% shipping
        $orderTotal = $preTaxTotal + $tax + $shipping;

        return [
            'items' => $items,
            'totalQty' => $totalQty,
            'preTaxTotal' => $preTaxTotal,
            'tax' => $tax,
            'shipping' => $shipping,
            'orderTotal' => $orderTotal
        ];
    }
}
