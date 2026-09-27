<?php
// Load database connection
require_once __DIR__ . '/../config/db.php';

// Load the Cart Controller
require_once __DIR__ . '/../app/controllers/CartController.php';

// Create controller instance and pass the PDO connection
$controller = new CartController();
$controller->index($pdo);
