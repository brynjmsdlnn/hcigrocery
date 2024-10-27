<?php
// init.php
require_once 'database/config.php';
require_once 'database/database.php';
require_once 'auth/Auth.php';
require_once 'middleware/AuthMiddleware.php';

// Initialize database connection
$database = new Database();
$db = $database->getConnection();

// Initialize authentication
$auth = new Auth($db);
AuthMiddleware::init($auth);

// Handle authentication for current route
AuthMiddleware::handle();
