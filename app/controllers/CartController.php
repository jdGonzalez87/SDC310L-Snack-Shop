<?php

require_once __DIR__ . '/../models/ProductModel.php';
require_once __DIR__ . '/../models/CartModel.php';

class CartController
{
    public function index($pdo)
    {
        $productModel = new ProductModel($pdo);
        $cartModel = new CartModel();

        // Handle cart actions
        if (isset($_GET['action']) && isset($_GET['id'])) {
            $action = $_GET['action'];
            $id = intval($_GET['id']);

            // Get product info for cart operations
            $product = $productModel->getProductById($id);

            if ($product) {
                if ($action === 'add') {
                    $cartModel->add($product);
                } elseif ($action === 'remove') {
                    $cartModel->remove($id);
                } elseif ($action === 'increase') {
                    $cartModel->increase($id);
                } elseif ($action === 'decrease') {
                    $cartModel->decrease($id);
                }
            }

            // Redirect to avoid repeated actions on refresh
            header("Location: cart.php");
            exit;
        }

        // Handle checkout (clear cart)
        if (isset($_GET['action']) && $_GET['action'] === 'checkout') {
            $cartModel->clear();
            header("Location: catalog.php");
            exit;
        }

        // Get cart totals and items
        $totals = $cartModel->calculateTotals();

        // Load the view
        include __DIR__ . '/../views/cart.view.php';
    }
}
