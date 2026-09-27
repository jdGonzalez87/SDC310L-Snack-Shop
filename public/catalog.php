<?php
// Load database connection
require_once __DIR__ . '/../config/db.php';

// Load the Catalog Controller
require_once __DIR__ . '/../app/controllers/CatalogController.php';

// Create controller instance and pass the PDO connection
$controller = new CatalogController();
$controller->index($pdo);
