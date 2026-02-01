<?php
session_start();    
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/CartModel.php';
require_once __DIR__ . '/../models/CartItemModel.php';
require_once __DIR__ . '/../helpers/Auth.php';
require_once __DIR__ . '/../models/OrderModel.php';
require_once __DIR__ . '/../models/OrderItemModel.php';

class CartController
{
    private $cartModel;
    public $cartItemModel;
    private $orderModel;
    private $orderItemModel;
    private $pdo;

    public function __construct()
    {
        $this->pdo = (new Database())->connect();
        $this->cartModel = new CartModel($this->pdo);
        $this->cartItemModel = new CartItemModel($this->pdo);
        $this->orderModel = new OrderModel($this->pdo);
        $this->orderItemModel = new OrderItemModel($this->pdo);
    }

    private function getCartId()
    {
        $userId = Auth::user()['id'];
        $cart = $this->cartModel->getActiveCart($userId);
        if (!$cart) {
            return $this->cartModel->create($userId);
        }
        return $cart['id'];
    }

    public function index()
    {
        Auth::requireLogin();
        $cartId = $this->getCartId();
        return $this->cartItemModel->getItems($cartId);
    }

    
    public function add()
    {
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

    
    public function update()
    {
        Auth::requireLogin();

        $this->cartItemModel->updateQuantity(
            $_POST['item_id'],
            $_POST['quantity']
        );

        header("Location: ../public/cart.php");
        exit;
    }

    
    public function remove($id)
    {
        Auth::requireLogin();

        $this->cartItemModel->remove($id);

        header("Location: ../public/cart.php");
        exit;
    }

    public function checkout()
{
    Auth::requireLogin();

    $userId = Auth::user()['id'];
    $cartId = $this->getCartId();

    try {
        $orderId = $this->cartModel->checkout($cartId, $userId);

        
        header("Location: ../public/order_success.php?id=" . $orderId);
        exit;

    } catch (Exception $e) {
        die("Checkout failed: " . $e->getMessage());
    }
}
}
