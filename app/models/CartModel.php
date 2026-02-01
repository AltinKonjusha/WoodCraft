<?php

class CartModel {
    public $conn;
    public $table = "carts";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getActiveCart($userId) {
        $stmt = $this->conn->prepare("
            SELECT * FROM {$this->table}
            WHERE user_id = :user_id AND status = 'active'
            LIMIT 1
        ");
        $stmt->execute([':user_id' => $userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($userId) {
        $stmt = $this->conn->prepare("
            INSERT INTO {$this->table} (user_id)
            VALUES (:user_id)
        ");
        $stmt->execute([':user_id' => $userId]);
        return $this->conn->lastInsertId();
    }

    public function checkout($cartId) {
        $stmt = $this->conn->prepare("
            UPDATE {$this->table}
            SET status = 'checked_out'
            WHERE id = :id
        ");
        return $stmt->execute([':id' => $cartId]);
    }
}
