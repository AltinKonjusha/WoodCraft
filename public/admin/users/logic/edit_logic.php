<?php
require_once __DIR__ . "/../../../../app/config/database.php";
require_once __DIR__ . "/../../../../app/models/UserModel.php";
require_once __DIR__ . "/../../../../app/helpers/Auth.php";

Auth::requireLogin();
Auth::requireAdmin();

$db = (new Database())->connect();
$userModel = new UserModel($db);

// GET USER TO EDIT
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$user = $userModel->find($_GET['id']);
if (!$user) {
    header("Location: index.php");
    exit;
}

// HANDLE UPDATE
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userModel->update($user['id'], [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'role' => $_POST['role']
    ]);
    header("Location: index.php");
    exit;
}