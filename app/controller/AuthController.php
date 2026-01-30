<?php
session_start();

require_once "../config/database.php";
require_once "../models/UserModel.php";
require_once "../helpers/Auth.php";

class AuthController {

    private $userModel;

    public function __construct() {
        $db = (new Database())->connect();
        $this->userModel = new UserModel($db);
    }

    public function register() {

        if (!$_POST['email'] || !$_POST['password'] || !$_POST['name']) {
            header("Location: /register.php?error=missing");
            exit;
        }

        $this->userModel->create([
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'role' => 'user'
        ]);

        header("Location: /login.php?registered=1");
        exit;
    }

    public function login() {

        $user = $this->userModel->findByEmail($_POST['email']);

        if (!Auth::login($user, $_POST['password'])) {
            header("Location: /login.php?error=invalid");
            exit;
        }

        if (Auth::isAdmin()) {
            header("Location: /admin/dashboard.php");
        } else {
            header("Location: /dashboard.php");
        }

        exit;
    }

    public function logout() {
        Auth::logout();
        header("Location: /login.php");
        exit;
    }
}
