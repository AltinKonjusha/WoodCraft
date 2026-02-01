<?php
session_start();

require_once "../app/config/database.php";
require_once "../app/models/ProductModel.php";

$database = new Database();
$db = $database->connect();

$productModel = new ProductModel($db);

$products = $productModel->all();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>All Products | WoodCraft Dru</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/index.css">
</head>

<body>

  <nav class="navbar navbar-expand-lg fixed-top">
    <div style="padding-left: 0px !important; margin-left: 20px !important;" class="container">
      <img style="height: auto; width: 50px; margin-right: 60px ; margin-left: 15px !important; margin-top: 0px;"
        src="assets/img/Logo 3.png">
      <a class="navbar-brand" href="index.php">WoodCraft Dru</a>
      <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navMenu">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="aboutus.php">About Us</a></li>
          <li class="nav-item"><a class="nav-link" href="contactus.php">Contact</a></li>
          <li class="nav-item"><a class="nav-link" href="cart.php">AddToCart</a></li>
          <li class="nav-item ms-lg-3">
            <?php if (isset($_SESSION['user'])): ?>
              <a class="btn btn-wood" href="account.php">My Account</a>
              <a class="btn btn-wood ms-2" href="../routes/logout.php">Logout</a>
            <?php else: ?>
              <a class="btn btn-wood" href="login.php">Sign In</a>
            <?php endif; ?>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <section id="products" class="container py-5">
    <div id="productRow" class="row g-4">

      <?php foreach ($products as $product): ?>

        <div class="col-md-4">
          <div class="card">

            <?php if (!empty($product['image'])): ?>
              <img src="data:image/jpeg;base64,<?= base64_encode($product['image']) ?>" class="product-img"
                alt="<?= htmlspecialchars($product['name']) ?>">
            <?php endif; ?>

            <div class="card-body">
              <h5 class="card-title"><?= htmlspecialchars($product['name']) ?></h5>
              <p class="card-text"><?= htmlspecialchars($product['description']) ?></p>

              <form action="../routes/cart.php" method="POST">
                <input type="hidden" name="action" value="add">
                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">

                <div class="d-flex align-items-center mb-2">
                  <label for="qty-<?= $product['id'] ?>" class="me-2 mb-0">Qty:</label>
                  <input type="number" id="qty-<?= $product['id'] ?>" name="quantity" value="1" min="1"
                    class="form-control" style="width: 70px;">
                </div>

                <button type="submit" class="btn btn-wood w-100">
                  Add to Cart – €<?= number_format($product['price'], 2) ?>
                </button>
              </form>

            </div>

          </div>
        </div>

      <?php endforeach; ?>

    </div>
  </section>



  <footer class="footer text-center text-lg-start">
    <div class="container py-4">
      <div class="row">
        <div class="col-md-4 mb-3">
          <h5 class="footer-title">WoodCraft Boards</h5>
          <p>Premium handcrafted wooden cutting boards made with passion and natural hardwoods.</p>
        </div>
        <div class="col-md-4 mb-3">
          <h5 class="footer-title">Contacts</h5>
          <i class="fa fa-phone"></i> 12345679<br>
          <i class="fa fa-envelope"></i> darisdumani@gmail.com<br>
          <i class="fa fa-address-book"></i> <a href="contactus.php"
            style="color:#f8e9d2;text-decoration:none;">Contact</a>
        </div>
        <div class="col-md-4 mb-3">
          <h5 class="footer-title">Follow Us</h5>
          <i class="fa fa-facebook"></i> <a href="#" style="color:#f8e9d2;text-decoration:none;">Facebook</a><br>
          <i class="fa fa-instagram"></i> <a href="#" style="color:#f8e9d2;text-decoration:none;">Instagram</a>
        </div>
      </div>
      <hr>
      <p class="mb-0">&copy; 2025 WoodCraft Boards | Handmade in Kosovo</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/cart.js"></script>
</body>

</html>