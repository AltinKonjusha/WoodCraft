<?php

require_once __DIR__ . "/../../../../app/config/database.php";
require_once __DIR__ . "/../../../../app/models/MessageModel.php";
require_once __DIR__ . "/../../../../app/helpers/Auth.php";

Auth::requireLogin();
Auth::requireAdmin();

$db = (new Database())->connect();
$messageModel = new MessageModel($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $messageModel->delete($_POST['id']);
    header("Location: index.php");
    exit;
}

$messages = $messageModel->getAll();
