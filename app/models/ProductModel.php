<?php

class ProductModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Get all products
    public function getAllProducts()
    {
        $stmt = $this->pdo->query("SELECT id, name, description, cost FROM products");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get a single product by ID
    public function getProductById($id)
    {
        $stmt = $this->pdo->prepare("SELECT id, name, description, cost FROM products WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
