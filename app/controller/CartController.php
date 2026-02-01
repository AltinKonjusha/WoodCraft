<?php
session_start();

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/CartModel.php';
require_once __DIR__ . '/../models/CartItemModel.php';
require_once __DIR__ . '/../helpers/Auth.php';

class CartController {

    public $cartModel;
    public $cartItemModel;

    public function __construct() {
        $db = (new Database())->connect();
        $this->cartModel = new CartModel($db);
        $this->cartItemModel = new CartItemModel($db);
    }

    private function getCartId() {
        $userId = Auth::user()['id'];

        $cart = $this->cartModel->getActiveCart($userId);

        if (!$cart) {
            return $this->cartModel->create($userId);
        }

        return $cart['id'];
    }

    public function index() {
        Auth::requireLogin();

        $cartId = $this->getCartId();
        return $this->cartItemModel->getItems($cartId);
    }

    public function add() {
        Auth::requireLogin();

        $cartId = $this->getCartId();

        $this->cartItemModel->add(
            $cartId,
            $_POST['product_id'],
            $_POST['quantity'] ?? 1
        );

        header("Location: ../public/cart.php");
        exit;
    }

    public function update() {
        Auth::requireLogin();

        $this->cartItemModel->updateQuantity(
            $_POST['item_id'],
            $_POST['quantity']
        );

        header("Location: ../public/cart.php");
        exit;
    }

    public function remove($id) {
        Auth::requireLogin();

        $this->cartItemModel->remove($id);

        header("Location: ../public/cart.php");
        exit;
    }

    public function checkout() {
        Auth::requireLogin();

        $cartId = $this->getCartId();
        $this->cartModel->checkout($cartId);

        header("Location: ../routes/checkout-success.php");
        exit;
    }
}
