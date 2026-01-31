    <?php
    session_start();

    require_once "../config/database.php";
    require_once "../models/ProductModel.php";
    require_once "../helpers/Auth.php";

    class ProductController {

        private $productModel;

        public function __construct() {
            $db = (new Database())->connect();
            $this->productModel = new ProductModel($db);
        }

        public function index() {
            return $this->productModel->all();
        }

        public function show($id) {
            return $this->productModel->find($id);
        }

        public function store() {
            Auth::requireAdmin();

            $this->productModel->create($_POST);

            header("Location: /admin/products.php");
            exit;
        }

        public function update($id) {
            Auth::requireAdmin();

            $this->productModel->update($id, $_POST);

            header("Location: /admin/products.php");
            exit;
        }

        public function delete($id) {
            Auth::requireAdmin();

            $this->productModel->delete($id);

            header("Location: /admin/products.php");
            exit;
        }
    }
