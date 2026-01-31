<?php

class OrderItemModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function add($order_id, $name, $price, $quantity) {
        $stmt = $this->pdo->prepare("
            INSERT INTO order_items (order_id, product_name, product_price, quantity)
            VALUES (?, ?, ?, ?)
        ");

        return $stmt->execute([
            $order_id,
            $name,
            $price,
            $quantity
        ]);
    }

    public function getByOrder($order_id) {
        $stmt = $this->pdo->prepare("
            SELECT * FROM order_items WHERE order_id = ?
        ");
        $stmt->execute([$order_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
