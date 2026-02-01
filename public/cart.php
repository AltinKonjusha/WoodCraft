<?php

require_once __DIR__ . '/../app/controller/CartController.php';

// Create CartController instance
$cartController = new CartController();

$items = $cartController->index();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Your Cart | WoodCraft Dru</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/index.css">
</head>
<body>

<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container">
    <a class="navbar-brand" href="index.php">WoodCraft Dru</a>
  </div>
</nav>

<div class="container py-5 mt-5">
  <h2 class="text-center mb-4">Your Shopping Cart</h2>
  <div class="row">
    <div class="col-lg-8" id="cartItems">

    <?php if(!empty($items)): ?>
        <?php foreach($items as $item): ?>
        <div class="card mb-3">
            <div class="card-body d-flex">

                <?php if(!empty($item['image'])): ?>
                    <img src="data:image/jpeg;base64,<?= base64_encode($item['image']) ?>"
                         width="100" class="me-3">
                <?php endif; ?>

                <div class="flex-grow-1">
                    <h5><?= htmlspecialchars($item['name']) ?></h5>
                    <p>Price: €<?= number_format($item['price'],2) ?></p>
                    <p>Quantity: <?= $item['quantity'] ?></p>
                    <p>Total: €<?= number_format($item['total'],2) ?></p>

                     
                    <form action="../routes/cart.php" method="POST">
                        <input type="hidden" name="action" value="remove">
                        <input type="hidden" name="item_id" value="<?= $item['id'] ?>">
                        <button class="btn btn-danger btn-sm mt-2">Remove</button>
                    </form>
                </div>

            </div>
        </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Your cart is empty.</p>
    <?php endif; ?>

    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Order Summary</h5>
                <hr>
                <?php
                $total = 0;
                foreach($items as $item){
                    $total += $item['total'];
                }
                ?>
                <p class="d-flex justify-content-between">
                    <span>Total</span>
                    <strong>€<?= number_format($total,2) ?></strong>
                </p>

                <form action="../routes/cart.php" method="POST">
                    <input type="hidden" name="action" value="checkout">
                    <button class="btn btn-wood w-100 mt-3">Proceed to Checkout</button>
                </form>

            </div>
        </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
