<?php
require_once __DIR__ . "/../../../../app/config/database.php";
require_once __DIR__ . "/../../../../app/models/ProductModel.php";
require_once __DIR__ . "/../../../../app/helpers/Auth.php";

Auth::requireLogin();
Auth::requireAdmin();

$db = (new Database())->connect();
$productModel = new ProductModel($db);

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: index.php");
    exit;
}

$product = $productModel->find($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $imageData = $product['image'] ?? null; // keep current image if not replaced

    if (!empty($_FILES['image']['tmp_name'])) {
        $imageData = file_get_contents($_FILES['image']['tmp_name']);
    }

    $data = [
        'name' => $_POST['name'],
        'description' => $_POST['description'],
        'price' => $_POST['price'],
        'stock' => $_POST['stock'],
        'image' => $imageData
    ];

    $productModel->update($id, $data);

    header("Location: index.php");
    exit;
}
