<?php
session_start();

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/UserModel.php';
require_once __DIR__ . '/../helpers/Auth.php';

class EditProfileController {

    public $userModel;

    public function __construct() {
        Auth::requireLogin();
        $db = (new Database())->connect();
        $this->userModel = new UserModel($db);
    }

    public function show() {
        return Auth::user();
    }

    public function update() {
        $user = Auth::user();
        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'role' => $user['role'] 
        ];

        $this->userModel->update($user['id'], $data);

        if (!empty($_POST['password'])) {
            $this->userModel->updatePassword($user['id'], $_POST['password']);
        }

        $_SESSION['user']['name'] = $data['name'];
        $_SESSION['user']['email'] = $data['email'];

        header("Location: ../public/account.php?success=1");
        exit;
    }
}

$controller = new EditProfileController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->update();
} else {
    $user = $controller->show();
}
