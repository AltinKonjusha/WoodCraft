<?php
session_start();

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/MessageModel.php';
require_once __DIR__ . '/../helpers/Auth.php';

class MessageController {

    private $messageModel;

    public function __construct() {
        Auth::requireLogin(); 

        $db = (new Database())->connect();
        $this->messageModel = new MessageModel($db);
    }

    public function store() {

        $user = Auth::user();

        $this->messageModel->create(
            $user['id'], 
            $_POST['name'],
            $_POST['email'],
            $_POST['subject'],
            $_POST['message']
        );

        header("Location: /contactus.php?success=1");
        exit;
    }
}
