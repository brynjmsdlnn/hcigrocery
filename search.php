<?php
class ProductSearch {
    private $conn;
    
    public function __construct($db) {
        if (!$db) {
            throw new Exception("Database connection is required");
        }
        $this->conn = $db;
    }
    
    public function searchProducts($keyword) {
        try {
            $keyword = '%' . $keyword . '%';
            
            $query = "SELECT 
                        p.*, 
                        c.name as category_name
                      FROM 
                        products p
                        LEFT JOIN categories c ON p.category_id = c.id
                      WHERE 
                        p.name LIKE :keyword OR 
                        p.description LIKE :keyword OR
                        c.name LIKE :keyword
                      ORDER BY 
                        p.name ASC";
            
            $stmt = $this->conn->prepare($query);
            if (!$stmt) {
                throw new Exception("Failed to prepare statement");
            }
            
            $stmt->bindParam(':keyword', $keyword);
            $success = $stmt->execute();
            
            if (!$success) {
                throw new Exception("Failed to execute query");
            }
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (Exception $e) {
            throw new Exception("Search failed: " . $e->getMessage());
        }
    }
}