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
}
