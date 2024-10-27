<?php
class Cart {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function addItem($userId, $productId, $quantity = 1) {
        $stmt = $this->db->prepare("SELECT * FROM cart WHERE user_id = ? AND product_id = ?");
        $stmt->execute([$userId, $productId]);
        $item = $stmt->fetch();

        if ($item) {
            // Update quantity if item already exists
            $newQuantity = $item['quantity'] + $quantity;
            $stmt = $this->db->prepare("UPDATE cart SET quantity = ? WHERE id = ?");
            $stmt->execute([$newQuantity, $item['id']]);
        } else {
            // Insert new item
            $stmt = $this->db->prepare("INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, ?)");
            $stmt->execute([$userId, $productId, $quantity]);
        }
    }

    public function updateItem($cartId, $quantity) {
        $stmt = $this->db->prepare("UPDATE cart SET quantity = ? WHERE id = ?");
        $stmt->execute([$quantity, $cartId]);
    }

    public function removeItem($cartId) {
        $stmt = $this->db->prepare("DELETE FROM cart WHERE id = ?");
        $stmt->execute([$cartId]);
    }

    public function getItems($userId) {
        $stmt = $this->db->prepare("SELECT c.id, c.quantity, p.name, p.price 
                                    FROM cart c 
                                    JOIN products p ON c.product_id = p.id 
                                    WHERE c.user_id = ?");
        $stmt->execute([$userId]);
        return $stmt->fetchAll();
    }
}
