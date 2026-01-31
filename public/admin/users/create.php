<?php
session_start();
require_once __DIR__ . "/logic/create_logic.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $id ? 'Edit User' : 'Create User' ?> — WoodCraft Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/index.css">
    <script src="https://kit.fontawesome.com/ec76eb1cb4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style/create.css">
</head>
<body>

<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container">
    <a class="navbar-brand" href="../../index.php">WoodCraft Dru</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="users.php">Users</a></li>
        <li class="nav-item ms-lg-3"><a class="btn btn-wood" href="../../routes/logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container" style="margin-top:120px; max-width: 720px;">

    <div class="admin-header mb-5">
        <h1><?= $id ? 'Edit User' : 'Create New User' ?></h1>
        <p><?= $id ? 'Update the account details' : 'Add a new account to the WoodCraft platform' ?></p>
    </div>

    <div class="card form-card">
        <div class="card-body p-4">

            <form action="" method="POST">

                <div class="mb-3">
                    <label for="name">Full Name</label>
                    <input type="text"
                           name="name"
                           id="name"
                           class="form-control"
                           required
                           value="<?= $user['name'] ?? '' ?>">
                </div>

                <div class="mb-3">
                    <label for="email">Email Address</label>
                    <input type="email"
                           name="email"
                           id="email"
                           class="form-control"
                           required
                           value="<?= $user['email'] ?? '' ?>">
                </div>

                <div class="mb-3">
                    <label for="password"><?= $id ? 'New Password (leave blank to keep current)' : 'Password' ?></label>
                    <input type="password"
                           name="password"
                           id="password"
                           class="form-control"
                           <?= $id ? '' : 'required minlength="8"' ?>>
                </div>

                <div class="mb-4">
                    <label for="role">Role</label>
                    <select name="role" id="role" class="form-select" required>
                        <option value="user" <?= ($user['role'] ?? '') === 'user' ? 'selected' : '' ?>>User</option>
                        <option value="admin" <?= ($user['role'] ?? '') === 'admin' ? 'selected' : '' ?>>Admin</option>
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="users.php" class="btn btn-cancel"><i class="fa fa-arrow-left me-1"></i> Cancel</a>
                    <button type="submit" class="btn btn-save px-4">
                        <i class="fa fa-check me-1"></i> <?= $id ? 'Update User' : 'Create User' ?>
                    </button>
                </div>

            </form>

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
