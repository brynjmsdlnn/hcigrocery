<?php
// Prevent direct access to this file
if (!defined('ROOT_PATH')) {
    die('Direct access not permitted');
}

class Database {
    private $conn;
    
    public function __construct() {
        try {
            $this->conn = new PDO(
                "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME,
                DB_USER,
                DB_PASS,
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
            );
        } catch(PDOException $e) {
            throw new Exception("Connection failed: " . $e->getMessage());
        }
    }
    
    public function getConnection() {
        if (!$this->conn) {
            throw new Exception("Database connection not established");
        }
        return $this->conn;
    }
}