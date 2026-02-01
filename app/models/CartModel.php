<?php

class CartModel
{
    public $conn;
    public $table = "carts";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getActiveCart($userId)
    {
        $stmt = $this->conn->prepare("
            SELECT * FROM {$this->table}
            WHERE user_id = :user_id AND status = 'active'
            LIMIT 1
        ");
        $stmt->execute([':user_id' => $userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($userId)
    {
        $stmt = $this->conn->prepare("
            INSERT INTO {$this->table} (user_id)
            VALUES (:user_id)
        ");
        $stmt->execute([':user_id' => $userId]);
        return $this->conn->lastInsertId();
    }

    public function checkout($cartId, $userId)
    {
        try {
            $this->conn->beginTransaction();

            $stmt = $this->conn->prepare("
            SELECT SUM(ci.quantity * p.price) AS total
            FROM cart_items ci
            JOIN products p ON ci.product_id = p.id
            WHERE ci.cart_id = :cart_id
        ");
            $stmt->execute(['cart_id' => $cartId]);
            $total = $stmt->fetchColumn();

            $stmt = $this->conn->prepare("
            INSERT INTO orders (user_id, total)
            VALUES (:user_id, :total)
        ");
            $stmt->execute([
                'user_id' => $userId,
                'total' => $total
            ]);

            $orderId = $this->conn->lastInsertId();

            $stmt = $this->conn->prepare("
            INSERT INTO order_items (order_id, product_name, product_price, quantity)
            SELECT 
                :order_id,
                p.name,
                p.price,
                ci.quantity
            FROM cart_items ci
            JOIN products p ON ci.product_id = p.id
            WHERE ci.cart_id = :cart_id
        ");
            $stmt->execute([
                'order_id' => $orderId,
                'cart_id' => $cartId
            ]);

            $stmt = $this->conn->prepare("
            DELETE FROM cart_items WHERE cart_id = :cart_id
        ");
            $stmt->execute(['cart_id' => $cartId]);

            $stmt = $this->conn->prepare("
            UPDATE {$this->table}
            SET status = 'checked_out'
            WHERE id = :id
        ");
            $stmt->execute(['id' => $cartId]);

            $this->conn->commit();
            return $orderId;

        } catch (Exception $e) {
            $this->conn->rollBack();
            throw $e;
        }
    }



}


