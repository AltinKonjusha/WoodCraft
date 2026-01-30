<?php
session_start();

require_once "../config/database.php";
require_once "../models/UserModel.php";
require_once "../helpers/Auth.php";

class UserController {

    private $userModel;

    public function __construct() {
        $db = (new Database())->connect();
        $this->userModel = new UserModel($db);
    }

    public function register() {
        $this->userModel->create([
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'role' => 'user'
        ]);

        header("Location: /login.php");
        exit;
    }

    public function login() {
        $user = $this->userModel->findByEmail($_POST['email']);

        if (Auth::login($user, $_POST['password'])) {
            header("Location: /dashboard.php");
            exit;
        }

        header("Location: /login.php?error=1");
        exit;
    }

    public function logout() {
        Auth::logout();
        header("Location: /login.php");
        exit;
    }

    public function index() {
        Auth::requireLogin();
        Auth::requireAdmin();

        return $this->userModel->all();
    }

    public function delete($id) {
        Auth::requireLogin();
        Auth::requireAdmin();

        $this->userModel->delete($id);
        header("Location: /admin/users.php");
        exit;
    }
}
