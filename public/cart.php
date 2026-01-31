<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Your Cart | WoodCraft Dru</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/index.css">

</head>

<body>

<nav class="navbar navbar-expand-lg fixed-top">
      <div style="padding-left: 0px !important; margin-left: 20px !important;" class="container">
        <img style="height: auto; width: 50px; margin-right: 60px ; margin-left: 15px !important; margin-top: 0px; " src="assets/img/Logo 3.png" href="index.php"></img>
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
              <a class="btn btn-wood" href="signup.php">Sign In</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

<div class="container py-5 mt-5">

  <h2 class="text-center mb-4">Your Shopping Cart</h2>

  <div class="row">

    <div class="col-lg-8" id="cartItems">
    </div>

    <div class="col-lg-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Order Summary</h5>
          <hr>

          <p class="d-flex justify-content-between">
            <span>Total</span>
            <strong id="cartTotal">€0.00</strong>
          </p>

          <a href="#" class="btn btn-wood w-100 mt-3">
            Proceed to Checkout
          </a>
        </div>
      </div>
    </div>

  </div>
</div>

<footer class="footer text-center text-lg-start">
      <div class="container py-4">

        <div class="row">
          <div class="col-md-4 mb-3">
            <h5 class="footer-title">WoodCraft Boards</h5>
            <p>Premium handcrafted wooden cutting boards made with passion and natural hardwoods.</p>
          </div>

          <div class="col-md-4 mb-3">
            <h5 style="margin-left: 35px;" class="footer-title">Contacts</h5>
            <ul class="footer-links">
              <i class="fa fa-phone"></i><span style="padding: 0; margin: 0;" href="">   12345679</span><br>
              <i class="fa fa-envelope"></i><span style="padding: 0; margin: 0;" href="aboutus.html">   darisdumani@gmail.com</span><br>
              <i class="fa fa-address-book"></i><a style="color: #f8e9d2; text-decoration: none;" href="contactus.html">   Contact</a>
            </ul>
          </div>

          <div class="col-md-4 mb-3">
            <h5 class="footer-title">Follow Us</h5>
            <div class="social-icons">
              <i class="fa fa-facebook"></i><a style="color: #f8e9d2; text-decoration: none;" href="https://www.facebook.com/profile.php?id=61584623370516">   Facebook</a><br>
              <i class="fa fa-instagram"></i><a style="color: #f8e9d2; text-decoration: none;" href="https://www.instagram.com/woodcraft_dru/">   instagram<i class="bi bi-instagram"></i></a><br>
            </div>
          </div>
        </div>

        <hr>
        <p class="mb-0">&copy; 2025 WoodCraft Boards | Handmade in Kosovo</p>
      </div>
    </footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/cartPage.js"></script>

</body>
</html>
