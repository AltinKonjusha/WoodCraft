<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>woodcraft_dru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/index.css">
    <script src="https://kit.fontawesome.com/ec76eb1cb4.js" crossorigin="anonymous"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg fixed-top">
  <div style="padding-left: 0px !important; margin-left: 20px !important;" class="container">
    <img style="height: auto; width: 50px; margin-right: 60px ; margin-left: 15px !important; margin-top: 0px;" src="assets/img/Logo 3.png">
    <a class="navbar-brand" href="index.php">WoodCraft Dru</a>
    <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="aboutus.html">About Us</a></li>
        <li class="nav-item"><a class="nav-link" href="contactus.html">Contact</a></li>
        <li class="nav-item"><a class="nav-link" href="cart.html">AddToCart</a></li>
        <li class="nav-item ms-lg-3">
          <?php if(isset($_SESSION['user'])): ?>
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

<header class="hero mt-5">
  <div class="hero-overlay">
    <div class="text-center hero-text">
      <h1 class="display-4">Premium Wooden Cutting Boards</h1>
      <p class="lead">Handcrafted from 100% natural hardwoods</p>
      <a href="#products" class="btn btn-wood btn-lg px-4">Browse Products</a>
    </div>
  </div>
</header>

<section id="products" class="container py-5">
  <h2 class="text-center mb-5" style="color: var(--brown-dark);">Our Products</h2>
  <div class="slider">
    <div class="slides">
      <div class="slide">
        <img src="assets/img/IMG_0835.JPG" alt="Oak Serving Board">
        <div class="caption">
          <h5>Oak Serving Board</h5>
          <p>Handmade from solid oak, perfect for serving cheese and appetizers.</p>
          <button class="btn btn-wood add-to-cart w-100" data-id="1" data-name="Oak Serving Board" data-price="34.99" data-image="assets/img/IMG_0835.JPG">
            Add to Cart - €34.99
          </button>
        </div>
      </div>
      <div class="slide">
        <img src="assets/img/IMG_0832.jpg" alt="Walnut Butcher Block">
        <div class="caption">
          <h5>Walnut Butcher Block</h5>
          <p>Durable, dense, and reversible — ideal for everyday kitchen use.</p>
          <button class="btn btn-wood add-to-cart w-100" data-id="2" data-name="Walnut Butcher Block" data-price="31.99" data-image="assets/img/IMG_0832.jpg">
            Add to Cart - €31.99
          </button>
        </div>
      </div>
      <div class="slide">
        <img src="assets/img/IMG_0840.JPG" alt="Maple Edge Board">
        <div class="caption">
          <h5>Maple Edge Board</h5>
          <p>Lightweight premium maple, resistant to knife marks and moisture.</p>
          <button class="btn btn-wood add-to-cart w-100" data-id="3" data-name="Maple Edge Board" data-price="32.99" data-image="assets/img/IMG_0840.JPG">
            Add to Cart - €32.99
          </button>
        </div>
      </div>
    </div>
    <button class="prev">&#10094;</button>
    <button class="next">&#10095;</button>
    <div class="dots">
      <span class="dot active"></span>
      <span class="dot"></span>
      <span class="dot"></span>
    </div>
  </div>
</section>

<section id="products" class="container py-5">
  <div id="productRow" class="row g-4">
    <div class="col-md-4">
      <div class="card">
        <img src="assets/img/IMG_0844.JPG" class="product-img" alt="Cutting Board">
        <div class="card-body">
          <h5 class="card-title">Oak Serving Board</h5>
          <p class="card-text">Handmade from solid oak, perfect for serving cheese and appetizers.</p>
          <button class="btn btn-wood add-to-cart w-100" data-id="1" data-name="Oak Serving Board" data-price="34.99" data-image="assets/img/IMG_0844.JPG">
            Add to Cart - €34.99
          </button>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <img src="assets/img/IMG_0592.jpg" class="product-img" alt="Cutting Board">
        <div class="card-body">
          <h5 class="card-title">Walnut Butcher Block</h5>
          <p class="card-text">Durable, dense, and reversible — ideal for everyday kitchen use.</p>
          <button class="btn btn-wood add-to-cart w-100" data-id="2" data-name="Walnut Butcher Block" data-price="31.99" data-image="assets/img/IMG_0592.jpg">
            Add to Cart - €31.99
          </button>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <img src="assets/img/IMG_0849.JPG" class="product-img" alt="Cutting Board">
        <div class="card-body">
          <h5 class="card-title">Maple Edge Board</h5>
          <p class="card-text">Lightweight premium maple, resistant to knife marks and moisture.</p>
          <button class="btn btn-wood add-to-cart w-100" data-id="3" data-name="Maple Edge Board" data-price="32.99" data-image="assets/img/IMG_0849.JPG">
            Add to Cart - €32.99
          </button>
        </div>
      </div>
    </div>
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
        <i class="fa fa-address-book"></i> <a href="contactus.html" style="color:#f8e9d2;text-decoration:none;">Contact</a>
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
<script src="assets/js/index.js"></script>
<script src="assets/js/cart.js"></script>
</body>
</html>
