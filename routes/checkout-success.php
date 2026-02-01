<?php
session_start();

require_once "../app/config/database.php";
require_once "../app/models/OrderModel.php";
require_once "../app/models/OrderItemModel.php";

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

if (empty($_SESSION['cart'])) {
    header("Location: cart.php");
    exit;
}

$database = new Database();
$pdo = $database->connect();

$orderModel = new OrderModel($pdo);
$orderItemModel = new OrderItemModel($pdo);

$user_id = $_SESSION['user']['id'];
$cart = $_SESSION['cart'];

$total = 0;
foreach ($cart as $item) {
    $total += $item['price'] * $item['quantity'];
}

try {   
    $pdo->beginTransaction();

    $order_id = $orderModel->create($user_id, $total);

    foreach ($cart as $item) {
        $orderItemModel->add(
            $order_id,
            $item['name'],
            $item['price'],
            $item['quantity']
        );
    }

    unset($_SESSION['cart']);

    $pdo->commit();

    header("Location: order_success.php?id=" . $order_id);
    exit;

} catch (Exception $e) {
    $pdo->rollBack();
    die("Checkout failed: " . $e->getMessage());
}
