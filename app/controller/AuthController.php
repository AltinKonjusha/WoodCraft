<?php

require_once __DIR__ . "/../config/database.php";
require_once __DIR__ . "/../models/UserModel.php";
require_once __DIR__ . "/../helpers/Auth.php";

class AuthController {

    private $userModel;

    public function __construct() {
        $db = (new Database())->connect();
        $this->userModel = new UserModel($db);
    }

    public function login() {

        if (!isset($_POST['email'], $_POST['password'])) {
            header("Location: ../login.php?error=missing");
            exit;
        }

        $user = $this->userModel->findByEmail($_POST['email']);

        if (!Auth::login($user, $_POST['password'])) {
            header("Location: ../public/login.php?error=invalid");
            exit;
        }

        if (Auth::isAdmin()) {
            header("Location: ../public/dashboard/index.php");
        } else {
            header("Location: ../public/index.php");
        }

        exit;
    }

    public function logout() {
        Auth::logout();
        header("Location: ../login.php");
        exit;
    }

    public function register()
{
    if (!isset($_POST['name'], $_POST['email'], $_POST['password'], $_POST['confirm_password'])) {
        header("Location: ../public/signup.php?error=Missing fields");
        exit;
    }

    if ($_POST['password'] !== $_POST['confirm_password']) {
        header("Location: ../public/signup.php?error=Passwords do not match");
        exit;
    }

    if (strlen($_POST['password']) < 8) {
        header("Location: ../public/signup.php?error=Password too short");
        exit;
    }

    if ($this->userModel->findByEmail($_POST['email'])) {
        header("Location: ../public/signup.php?error=Email already exists");
        exit;
    }

    $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $this->userModel->create([
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'password' => $_POST['password'],
        'role' => 'user'
    ]);

    header("Location: ../public/login.php?success=Account created");
    exit;
}

}
