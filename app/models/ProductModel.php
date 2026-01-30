<?php

class ProductModel {
    private $conn;
    private $table = "products";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($data) {
        $stmt = $this->conn->prepare("
            INSERT INTO {$this->table}
            (name, description, price, stock, image)
            VALUES (:name, :description, :price, :stock, :image)
        ");

        return $stmt->execute($data);
    }

    public function all() {
        return $this->conn
            ->query("SELECT * FROM {$this->table}")
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id) {
        $stmt = $this->conn->prepare("
            SELECT * FROM {$this->table} WHERE id = :id
        ");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data) {
        $stmt = $this->conn->prepare("
            UPDATE {$this->table}
            SET name = :name,
                description = :description,
                price = :price,
                stock = :stock,
                image = :image
            WHERE id = :id
        ");

        $data['id'] = $id;
        return $stmt->execute($data);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("
            DELETE FROM {$this->table} WHERE id = :id
        ");
        return $stmt->execute([':id' => $id]);
    }
}
