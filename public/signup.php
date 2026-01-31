<?php
session_start();

if(isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Sign Up — Woodcraft</title>
    <link rel="stylesheet" href="assets/css/form.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>

<body>
<div class="wrapper">
<div class="card">

<div class="left">
    <h2>Create your account</h2>

    <p class="subtitle">
        Every grain tells a story — start crafting yours.<br />
        Join our community of makers and enjoy handcrafted wood pieces.
    </p>

    <form id="signupForm" method="POST" action="../routes/register.php" autocomplete="on">

        <label for="fullName">Full name</label>
        <input id="fullName" name="name" type="text" placeholder="Jane Doe" required />

        <label for="signupEmail">Email</label>
        <input id="signupEmail" name="email" type="email" placeholder="example@email.com" required />

        <label for="signupPassword">Password</label>
        <input id="signupPassword" name="password" type="password"
               placeholder="At least 8 characters" minlength="8" required />

        <label for="signupConfirm">Confirm password</label>
        <input id="signupConfirm" name="confirm_password" type="password"
               placeholder="Repeat your password" minlength="8" required />

        <button type="submit" class="btn-primary">Create account</button>

    </form>

    <?php if(isset($_GET['error'])): ?>
        <p style="color:red;margin-top:12px;">
            <?= htmlspecialchars($_GET['error']) ?>
        </p>
    <?php endif; ?>

    <?php if(isset($_GET['success'])): ?>
        <p style="color:green;margin-top:12px;">
            <?= htmlspecialchars($_GET['success']) ?>
        </p>
    <?php endif; ?>

    <p class="signup" style="margin-top: 14px;">
        Already have an account? <a href="login.php">Sign in</a>
    </p>

</div>

<div class="right">
    <img src="assets/img/IMG_0861.JPG" alt="Artisan woodcraft" />
</div>

</div>
</div>

<script type="module" src="assets/js/auth.js"></script>
</body>
</html>
        