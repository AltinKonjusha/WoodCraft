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
              <a class="btn btn-wood" href="signup.html">Sign In</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

  <div class="container-fluid h-100" style="padding-top: 70px;">
    <div class="row h-100">

      <div class="col-lg-5 d-flex align-items-center justify-content-center bg-light">
        <div class="w-75">

          <h2 class="mb-4">Contact Us</h2>

          <form class="">
            <div class="mb-3">
              <label class="form-label">Your Name</label>
              <input type="text" class="form-control" placeholder="Enter your name">
            </div>

            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" class="form-control" placeholder="Enter your email">
            </div>

            <div class="mb-3">
              <label class="form-label">Feedback</label>
              <textarea class="form-control" rows="4" placeholder="Write your feedback"></textarea>
            </div>

            <button type="submit" class="btn btn-dark w-100">
              Send Feedback
            </button>
          </form>

        </div>
      </div>

      <div class="col-lg-7 p-0">
        <iframe
          class="w-100 h-100 border-0"
          src="https://www.google.com/maps?q=Prishtina,Kosovo&output=embed"
          loading="lazy"
        ></iframe>
      </div>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
