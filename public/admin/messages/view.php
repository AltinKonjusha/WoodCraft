<?php
session_start();
require_once __DIR__ . "/logic/view_logic.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>View Message — WoodCraft Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="style/view.css">
    <script src="https://kit.fontawesome.com/ec76eb1cb4.js" crossorigin="anonymous"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container">
    <a class="navbar-brand" href="../../index.php">WoodCraft Dru</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="../../index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="../users/index.php">Users</a></li>
        <li class="nav-item"><a class="nav-link" href="../products/index.php">Products</a></li>
        <li class="nav-item"><a class="nav-link" href="../orders/index.php">Orders</a></li>
        <li class="nav-item"><a class="nav-link active" href="index.php">Messages</a></li>
        <li class="nav-item ms-lg-3">
          <a class="btn btn-wood" href="../../../routes/logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container" style="margin-top:120px; max-width: 720px;">

    <div class="admin-header mb-5">
        <h1>Message Details</h1>
        <p>Full information about the customer message</p>
    </div>

    <div class="card form-card mb-4">
        <div class="card-body p-4">

            <div class="mb-3">
                <label class="form-label fw-bold">Name:</label>
                <p><?= htmlspecialchars($message['name']) ?></p>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Email:</label>
                <p><?= htmlspecialchars($message['email']) ?></p>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Subject:</label>
                <p><?= htmlspecialchars($message['subject']) ?></p>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Message:</label>
                <p><?= nl2br(htmlspecialchars($message['message'])) ?></p>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Date Received:</label>
                <p><?= date('Y-m-d H:i', strtotime($message['created_at'])) ?></p>
            </div>

            <a href="index.php" class="btn btn-cancel"><i class="fa fa-arrow-left me-1"></i> Back to Messages</a>

        </div>
    </div>

</div>

<footer class="footer text-center text-lg-start mt-5">
  <div class="container py-4">
    <hr>
    <p class="mb-0">&copy; 2026 WoodCraft Boards | Admin Panel</p>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
