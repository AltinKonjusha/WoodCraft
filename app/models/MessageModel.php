<?php

class MessageModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    public function create($user_id, $name, $email, $subject, $message) {
        $stmt = $this->pdo->prepare("
            INSERT INTO messages (user_id, name, email, subject, message)
            VALUES (?, ?, ?, ?, ?)
        ");

        return $stmt->execute([
            $user_id,
            $name,
            $email,
            $subject,
            $message
        ]);
    }

    public function getAll() {
        $stmt = $this->pdo->query("
            SELECT * FROM messages ORDER BY created_at DESC
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("
            DELETE FROM messages WHERE id = ?
        ");
        return $stmt->execute([$id]);
    }

    public function find($id) {
        $stmt = $this->pdo->prepare("
            SELECT * FROM messages WHERE id = ?
        ");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
