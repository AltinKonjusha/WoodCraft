<?php

require_once __DIR__ . "/../../../../app/config/database.php";
require_once __DIR__ . "/../../../../app/models/UserModel.php";
require_once __DIR__ . "/../../../../app/helpers/Auth.php";


Auth::requireLogin();
Auth::requireAdmin();

$db = (new Database())->connect();
$userModel = new UserModel($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $userModel->delete($_POST['id']);
    header("Location: index.php");
    exit;
}

$users = $userModel->all();