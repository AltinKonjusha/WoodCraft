<?php
session_start();
require_once __DIR__ . "/logic/edit_logic.php"; // your logic for fetching/updating products
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Product — WoodCraft Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="style/edit.css">
    <script src="https://kit.fontawesome.com/ec76eb1cb4.js" crossorigin="anonymous"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="../../index.php">WoodCraft Dru</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Products</a></li>
                    <li class="nav-item ms-lg-3"><a class="btn btn-wood" href="../../routes/logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container" style="margin-top:120px; max-width: 720px;">

        <div class="admin-header mb-5">
            <h1>Edit Product</h1>
            <p>Update product details</p>
        </div>

        <div class="card form-card">
            <div class="card-body p-4">

                <form action="" method="POST" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="name">Product Name</label>
                        <input type="text" name="name" id="name" class="form-control" required
                            value="<?= $product['name'] ?? '' ?>">
                    </div>

                    <div class="mb-3">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="4"
                            required><?= $product['description'] ?? '' ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="price">Price (€)</label>
                        <input type="number" step="0.01" min="0" name="price" id="price" class="form-control" required
                            value="<?= $product['price'] ?? '' ?>">
                    </div>

                    <div class="mb-3">
                        <label for="stock">Stock Quantity</label>
                        <input type="number" min="0" name="stock" id="stock" class="form-control" required
                            value="<?= $product['stock'] ?? '' ?>">
                    </div>

                    <div class="mb-4">
                        <label for="image">Product Image</label>
                        <input type="file" name="image" id="image" class="form-control" accept="image/*">
                        <?php if (!empty($product['image'])): ?>
                            <p class="mt-2">Current Image:</p>
                            <img src="data:image/jpeg;base64,<?= base64_encode($product['image']) ?>" alt="Product "
                                style="max-width:150px;">
                        <?php endif; ?>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="index.php" class="btn btn-cancel"><i class="fa fa-arrow-left me-1"></i> Cancel</a>
                        <button type="submit" class="btn btn-save px-4">
                            <i class="fa fa-check me-1"></i> Update Product
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