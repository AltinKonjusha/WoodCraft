<?php
session_start();

require_once __DIR__ . '/../app/config/database.php';
require_once __DIR__ . '/../app/models/MessageModel.php';
require_once __DIR__ . '/../app/helpers/Auth.php';

Auth::requireLogin();

$db = (new Database())->connect();
$messageModel = new MessageModel($db);

$user = Auth::user();
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $messageModel->create(
    $user['id'],
    $_POST['name'],
    $_POST['email'],
    $_POST['subject'],
    $_POST['message']
  );

  $success = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Contact Us</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/index.css">
</head>

<body class="vh-100 overflow-hidden">

  <nav class="navbar navbar-expand-lg fixed-top">
    <div style="padding-left: 0px !important; margin-left: 20px !important;" class="container">
      <img style="height:auto; width:50px; margin-right:60px; margin-left:15px !important;" src="assets/img/Logo 3.png">
      <a class="navbar-brand" href="index.php">WoodCraft Dru</a>

      <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navMenu">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="aboutus.php">About Us</a></li>
          <li class="nav-item"><a class="nav-link active" href="contactus.php">Contact</a></li>
          <li class="nav-item"><a class="nav-link" href="cart.php">AddToCart</a></li>

          <li class="nav-item ms-lg-3">
            <a class="btn btn-wood" href="/account.php">My Account</a>
            <a class="btn btn-wood ms-2" href="../routes/logout.php">Logout</a>
          </li>
        </ul>

      </div>
  </nav>

  <div class="container-fluid h-100" style="padding-top:70px;">
    <div class="row h-100">

      <div class="col-lg-5 d-flex align-items-center justify-content-center bg-light">

        <div class="w-75">

          <h2 class="mb-4">Contact Us</h2>

          <?php if ($success): ?>
            <div class="alert alert-success">
              Message sent successfully ✅
            </div>
          <?php endif; ?>

          <form method="POST">

            <div class="mb-3">
              <label class="form-label">Your Name</label>
              <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($user['name']) ?>"
                required>
            </div>

            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($user['email']) ?>"
                required>
            </div>

            <div class="mb-3">
              <label class="form-label">Subject</label>
              <input type="text" name="subject" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Message</label>
              <textarea name="message" class="form-control" rows="4" required></textarea>
            </div>

            <button type="submit" class="btn btn-wood w-100">
              Send Feedback
            </button>

          </form>

        </div>
      </div>

      <div class="col-lg-7 p-0">
        <iframe class="w-100 h-100 border-0" src="https://www.google.com/maps?q=Prishtina,Kosovo&output=embed"
          loading="lazy">
        </iframe>
      </div>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>