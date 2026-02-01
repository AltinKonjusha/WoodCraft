<?php
session_start();

$order_id = isset($_GET['id']) ? (int) $_GET['id'] : null;
if (!$order_id) {
    die("Invalid order.");
}

require_once __DIR__ . "/../app/config/database.php";
require_once __DIR__ . "/../app/models/OrderModel.php";
require_once __DIR__ . "/../app/models/OrderItemModel.php";

$database = new Database();
$pdo = $database->connect();

$orderModel = new OrderModel($pdo);
$orderItemModel = new OrderItemModel($pdo);

$order = $orderModel->find($order_id);
if (!$order) {
    die("Order not found.");
}

if (!isset($_SESSION['user']) || $order['user_id'] !== $_SESSION['user']['id']) {
    die("Unauthorized access.");
}

$items = $orderItemModel->getByOrder($order_id);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Order Success</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container py-5">
  <h2 class="text-success">Order Placed Successfully 🎉</h2>

  <p>Order ID: <strong>#<?= $order['id'] ?></strong></p>
  <p>Total: <strong>€<?= number_format($order['total'], 2) ?></strong></p>

  <hr>

  <?php foreach ($items as $item): ?>
    <div class="d-flex justify-content-between">
      <span><?= htmlspecialchars($item['product_name']) ?> × <?= $item['quantity'] ?></span>
      <span>€<?= number_format($item['product_price'] * $item['quantity'], 2) ?></span>
    </div>
  <?php endforeach; ?>

  <a href="products.php" class="btn btn-primary mt-4">Continue Shopping</a>
</div>

</body>
</html>
