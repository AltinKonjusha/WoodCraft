<?php
session_start();
require_once __DIR__ . '/../app/controller/CartController.php';

$cartController = new CartController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    switch($action){
        case 'add':
            $cartController->add();
            break;
        case 'remove':
            if(isset($_POST['item_id'])){
                $cartController->remove($_POST['item_id']);
            }
            break;
        case 'update':
            $cartController->update();
            break;
        case 'checkout':
            $cartController->checkout();
            break;
    }
} else {
    header("Location: WoodCraft/public/cart.php");
    exit;
}
