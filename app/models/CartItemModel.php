<?php

class CartItemModel {
    private $conn;
    private $table = "cart_items";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function add($cartId, $productId, $quantity = 1) {
        $stmt = $this->conn->prepare("
            INSERT INTO {$this->table} (cart_id, product_id, quantity)
            VALUES (:cart_id, :product_id, :quantity)
            ON DUPLICATE KEY UPDATE quantity = quantity + :quantity
        ");

        return $stmt->execute([
            ':cart_id'   => $cartId,
            ':product_id'=> $productId,
            ':quantity'  => $quantity
        ]);
    }

    public function getItems($cartId) {
        $stmt = $this->conn->prepare("
            SELECT
                ci.id,
                p.name,
                p.price,
                ci.quantity,
                (p.price * ci.quantity) AS total
            FROM {$this->table} ci
            JOIN products p ON p.id = ci.product_id
            WHERE ci.cart_id = :cart_id
        ");

        $stmt->execute([':cart_id' => $cartId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateQuantity($id, $quantity) {
        $stmt = $this->conn->prepare("
            UPDATE {$this->table}
            SET quantity = :quantity
            WHERE id = :id
        ");
        return $stmt->execute([
            ':quantity' => $quantity,
            ':id' => $id
        ]);
    }

    public function remove($id) {
        $stmt = $this->conn->prepare("
            DELETE FROM {$this->table}
            WHERE id = :id
        ");
        return $stmt->execute([':id' => $id]);
    }

    public function clear($cartId) {
        $stmt = $this->conn->prepare("
            DELETE FROM {$this->table}
            WHERE cart_id = :cart_id
        ");
        return $stmt->execute([':cart_id' => $cartId]);
    }
}
