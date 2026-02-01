<?php

class OrderModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function create($user_id, $total)
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO orders (user_id, total) VALUES (?, ?)"
        );
        $stmt->execute([$user_id, $total]);
        return $this->pdo->lastInsertId();
    }

    public function find($id)
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM orders WHERE id = ? LIMIT 1"
        );
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getByUser($user_id)
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM orders WHERE user_id = ? ORDER BY created_at DESC"
        );
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateStatus($order_id, $status)
    {
        $stmt = $this->pdo->prepare(
            "UPDATE orders SET status = ? WHERE id = ?"
        );
        return $stmt->execute([$status, $order_id]);
    }
    public function getAll()
    {
        $stmt = $this->pdo->query("
        SELECT 
            o.id, 
            o.user_id, 
            o.total, 
            o.status, 
            o.created_at,
            u.name AS user_name,
            u.email AS user_email
        FROM orders o
        LEFT JOIN users u ON o.user_id = u.id
        ORDER BY o.created_at DESC
    ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
