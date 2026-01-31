<?php

class UserModel {
    private $conn;
    private $table = "users";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($data) {
        $stmt = $this->conn->prepare("
            INSERT INTO {$this->table}
            (name, email, password, role)
            VALUES (:name, :email, :password, :role)
        ");

        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        $data['role'] = $data['role'] ?? 'user';

        return $stmt->execute($data);
    }

    public function all() {
        return $this->conn
            ->query("SELECT id, name, email, role, created_at FROM {$this->table}")
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id) {
        $stmt = $this->conn->prepare("
            SELECT id, name, email, role, created_at
            FROM {$this->table}
            WHERE id = :id
        ");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findByEmail($email) {
        $stmt = $this->conn->prepare("
            SELECT * FROM {$this->table}
            WHERE email = :email
            LIMIT 1
        ");
        $stmt->execute([':email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data) {
        $stmt = $this->conn->prepare("
            UPDATE {$this->table}
            SET name = :name,
                email = :email,
                role = :role
            WHERE id = :id
        ");

        return $stmt->execute([
            ':name' => $data['name'],
            ':email' => $data['email'],
            ':role' => $data['role'],
            ':id' => $id
        ]);
    }

    public function updatePassword($id, $password) {
        $stmt = $this->conn->prepare("
            UPDATE {$this->table}
            SET password = :password
            WHERE id = :id
        ");

        return $stmt->execute([
            ':password' => password_hash($password, PASSWORD_DEFAULT),
            ':id' => $id
        ]);
    }


    public function delete($id) {
        $stmt = $this->conn->prepare("
            DELETE FROM {$this->table}
            WHERE id = :id
        ");

        return $stmt->execute([':id' => $id]);
    }
}