<?php
session_start();

require_once __DIR__ . "/logic/index_logic.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>WoodCraft Admin — Products</title>

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
        <li class="nav-item"><a class="nav-link active" href="index.php">Products</a></li>
        <li class="nav-item ms-lg-3"><a class="btn btn-wood" href="../../../routes/logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container" style="margin-top:120px;">

    <div class="admin-header mb-5 d-flex justify-content-between align-items-center">
        <div>
            <h1>Products Dashboard</h1>
            <p>Manage all products crafted into the WoodCraft platform</p>
        </div>
        <a href="create.php" class="btn btn-create"><i class="fa fa-plus me-1"></i> Create Product</a>
    </div>

    <div class="card card-table">
        <div class="card-body p-0">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th class="ps-4">ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th class="text-end pe-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td class="ps-4"><?= $product['id'] ?></td>
                        <td><?= htmlspecialchars($product['name']) ?></td>
                        <td><?= htmlspecialchars($product['description']) ?></td>
                        <td>€<?= number_format($product['price'], 2) ?></td>
                        <td><?= $product['stock'] ?></td>
                        <td class="text-end pe-4">

                            <!-- EDIT BUTTON -->
                            <a href="edit.php?id=<?= $product['id'] ?>" class="btn btn-sm btn-edit text-white me-2">
                                <i class="fa fa-pen"></i>
                            </a>

                            <!-- DELETE BUTTON -->
                            <form action="" method="POST" class="d-inline">
                                <input type="hidden" name="id" value="<?= $product['id'] ?>">
                                <button class="btn btn-sm btn-delete text-white"
                                        onclick="return confirm('Remove this product?')">
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
