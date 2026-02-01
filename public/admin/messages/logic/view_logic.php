<?php
require_once __DIR__ . "/../../../../app/config/database.php";
require_once __DIR__ . "/../../../../app/models/MessageModel.php";
require_once __DIR__ . "/../../../../app/helpers/Auth.php";

Auth::requireLogin();
Auth::requireAdmin();

$db = (new Database())->connect();
$messageModel = new MessageModel($db);

$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: index.php");
    exit;
}

$message = $messageModel->find($id);

if (!$message) {
    header("Location: index.php");
    exit;
}
