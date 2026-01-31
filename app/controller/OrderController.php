<?php
require_once "../config/db.php";
require_once "../models/Order.php";

class OrderController {
    private $orderModel;

    public function __construct($pdo) {
        $this->orderModel = new Order($pdo);
    }

    public function userOrders($user_id) {
        echo json_encode(
            $this->orderModel->getByUser($user_id)
        );
    }

    public function updateStatus() {
        $order_id = $_POST['order_id'];
        $status = $_POST['status'];

        $this->orderModel->updateStatus($order_id, $status);

        echo json_encode(["success" => true]);
    }
}
