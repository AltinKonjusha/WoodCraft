<?php

class OrderModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function create($user_id, $total) {
        $stmt = $this->pdo->prepare("
            INSERT INTO orders (user_id, total)
            VALUES (?, ?)
        ");

        $stmt->execute([$user_id, $total]);

        return $this->pdo->lastInsertId();
    }

    public function getByUser($user_id) {
        $stmt = $this->pdo->prepare("
            SELECT * FROM orders WHERE user_id = ?
            ORDER BY created_at DESC
        ");
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateStatus($order_id, $status) {
        $stmt = $this->pdo->prepare("
            UPDATE orders SET status = ? WHERE id = ?
        ");
        return $stmt->execute([$status, $order_id]);
    }
}
