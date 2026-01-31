<?php
session_start();
require_once __DIR__ . "/logic/index_logic.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>WoodCraft Admin — Messages</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="style/index.css">
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

<div class="container" style="margin-top:120px;">

    <div class="admin-header mb-5">
        <h1>Messages Dashboard</h1>
        <p>Customer messages received through the platform</p>
    </div>

    <div class="card user-card">
        <div class="card-body p-0">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th class="ps-4">ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Date</th>
                        <th class="text-end pe-4">Action</th>
                    </tr>
                </thead>
                <tbody>

                <?php foreach ($messages as $message): ?>
                    <tr>
                        <td class="ps-4"><?= $message['id'] ?></td>
                        <td><?= htmlspecialchars($message['name']) ?></td>
                        <td><?= htmlspecialchars($message['email']) ?></td>
                        <td><?= htmlspecialchars($message['subject']) ?></td>
                        <td><?= date('Y-m-d', strtotime($message['created_at'])) ?></td>

                        <td class="text-end pe-4">

                            <a href="view.php?id=<?= $message['id'] ?>" class="btn btn-sm btn-edit text-white me-2">
                                <i class="fa fa-eye"></i>
                            </a>

                            <form method="POST" class="d-inline">
                                <input type="hidden" name="id" value="<?= $message['id'] ?>">
                                <button class="btn btn-sm btn-delete text-white"
                                        onclick="return confirm('Delete this message?')">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
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
