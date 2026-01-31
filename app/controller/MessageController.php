<?php
require_once "../config/db.php";
require_once "../models/Message.php";

class MessageController {
    private $messageModel;

    public function __construct($pdo) {
        $this->messageModel = new Message($pdo);
    }

    public function store() {
        $user_id = $_SESSION['user_id'] ?? null;
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        $this->messageModel->create(
            $user_id,
            $name,
            $email,
            $subject,
            $message
        );

        echo json_encode(["success" => true]);
    }

    public function index() {
        echo json_encode($this->messageModel->getAll());
    }
}
