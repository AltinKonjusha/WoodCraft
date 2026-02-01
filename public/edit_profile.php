<?php
require_once __DIR__ . '/../app/controller/EditProfileController.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Profile | WoodCraft Dru</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/index.css">
</head>
<body>

<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container">
    <a class="navbar-brand" href="index.php">WoodCraft Dru</a>
  </div>
</nav>

<div class="container py-5 mt-5" style="max-width: 600px;">
  <div class="card p-4">
    <h3>Edit Profile</h3>
    <hr>
    <?php if(isset($_GET['success'])): ?>
        <div class="alert alert-success">Profile updated successfully!</div>
    <?php endif; ?>
    <form method="POST" action="edit_profile.php">

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" id="name" name="name" class="form-control" value="<?= htmlspecialchars($user['name']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="<?= htmlspecialchars($user['email']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">New Password (leave blank to keep current)</label>
            <input type="password" id="password" name="password" class="form-control">
        </div>

        <div class="d-flex justify-content-between">
            <a href="account.php" class="btn btn-cancel">Back</a>
            <button type="submit" class="btn btn-save">Update Profile</button>
        </div>
    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
