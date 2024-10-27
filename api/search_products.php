<?php
header('Content-Type: application/json');

define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'] . '/hci/');

require_once ROOT_PATH . 'database/config.php';
require_once ROOT_PATH . 'database/database.php';
require_once ROOT_PATH . 'search.php';

try {
    $database = new Database();
    $db = $database->getConnection();
    
    if (!$db) {
        throw new Exception("Database connection failed");
    }
    
    $search = new ProductSearch($db);
    $keyword = isset($_GET['q']) ? $_GET['q'] : '';

    if (empty($keyword)) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Search keyword is required'
        ]);
        exit;
    }

    $results = $search->searchProducts($keyword);
    echo json_encode([
        'status' => 'success',
        'data' => $results
    ]);
    
} catch (Exception $e) {
    echo json_encode([
        'status' => 'error',
        'message' => 'An error occurred: ' . $e->getMessage(),
        'trace' => $e->getTraceAsString()
    ]);
}