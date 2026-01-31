<?php


require_once __DIR__ . "/../../../../app/config/database.php";
require_once __DIR__ . "/../../../../app/models/UserModel.php";
require_once __DIR__ . "/../../../../app/helpers/Auth.php";

Auth::requireLogin();
Auth::requireAdmin();

$db = (new Database())->connect();
$userModel = new UserModel($db);

$id = $_GET['id'] ?? null;
$user = $id ? $userModel->find($id) : null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'] ?? null;
    $role = $_POST['role'];

    if ($id) {
        $userModel->update($id, [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'role' => $role
        ]);
    } else {
        $userModel->create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'role' => $role
        ]);
    }

    header("Location: index.php");
    exit;
}