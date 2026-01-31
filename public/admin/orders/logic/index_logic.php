<?php

require_once __DIR__ . "/../../../../app/config/database.php";
require_once __DIR__ . "/../../../../app/models/OrderModel.php";
require_once __DIR__ . "/../../../../app/helpers/Auth.php";

Auth::requireLogin();
Auth::requireAdmin();

$db = (new Database())->connect();
$orderModel = new OrderModel($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $orderModel->delete($_POST['id']);
    header("Location: index.php");
    exit;
}

$orders = $orderModel->getAll();
