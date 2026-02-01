<?php
session_start();

require_once __DIR__ . '/../app/helpers/Auth.php';
require_once __DIR__ . '/../app/config/database.php';
require_once __DIR__ . '/../app/models/OrderModel.php';

Auth::requireLogin();

$user = Auth::user();

$db = (new Database())->connect();
$orderModel = new OrderModel($db);

$orders = $orderModel->getByUser($user['id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>My Account | WoodCraft Dru</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/index.css">
</head>
<body>

<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container">
    <a class="navbar-brand" href="index.php">WoodCraft Dru</a>
  </div>
</nav>

<div class="container py-5 mt-5">

  <h2 class="text-center mb-4">My Account</h2>

  <div class="row">
    <div class="col-lg-4 mb-4">
      <div class="card p-3">
        <h5>Personal Information</h5>
        <hr>
        <p><strong>Name:</strong> <?= htmlspecialchars($user['name']) ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
        <p><strong>Role:</strong> <?= htmlspecialchars($user['role']) ?></p>
        <a href="edit_profile.php" class="btn btn-wood w-100 mt-3">Edit Profile</a>
      </div>
    </div>

    <div class="col-lg-8">
      <div class="card p-3">
        <h5>My Orders</h5>
        <hr>
        <?php if(!empty($orders)): ?>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Order ID</th>
                <th>Total (€)</th>
                <th>Status</th>
                <th>Date</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($orders as $order): ?>
              <tr>
                <td><?= $order['id'] ?></td>
                <td>€<?= number_format($order['total'],2) ?></td>
                <td><?= ucfirst($order['status']) ?></td>
                <td><?= date('d M Y H:i', strtotime($order['created_at'])) ?></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        <?php else: ?>
          <p>You haven’t placed any orders yet.</p>
        <?php endif; ?>
      </div>
    </div>
  </div>

</div>

<footer class="footer text-center text-lg-start mt-5">
  <div class="container py-4">
    <hr>
    <p class="mb-0">&copy; 2026 WoodCraft Boards | Handmade in Kosovo</p>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
