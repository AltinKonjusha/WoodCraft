    <?php
    session_start();

    require_once __DIR__ . '/../app/controller/CartController.php';

    $cartController = new CartController();

    $action = $_POST['action'] ?? $_GET['action'] ?? null;

    switch ($action) {
        case 'add':
            $cartController->add();
            break;
        case 'update':
            $cartController->update();
            break;
        case 'remove':
            $id = $_POST['item_id'] ?? null;
            if ($id) {
                $cartController->remove($id);
            }
            break;
        case 'checkout':
            $cartController->checkout();
            break;
        default:
            header("Location: ../public/cart.php");
            exit;
    }

    header("Location: ../public/cart.php");
    exit;