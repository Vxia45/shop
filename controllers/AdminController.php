<?php
require_once 'models/Admin.php';
require_once 'models/Product.php';

class AdminController {
    
    public function login() {
        if (Admin::isLoggedIn()) {
            header('Location: ' . url('/admin/dashboard'));
            exit;
        }
        
        require_once 'views/admin/login.php';
    }

    public function processLogin() {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        $adminModel = new Admin();
        $admin = $adminModel->authenticate($username, $password);

        if ($admin) {
            $_SESSION['admin_logged'] = true;
            $_SESSION['admin_user'] = $admin['username'];
            header('Location: ' . url('/admin/dashboard'));
            exit;
        } else {
            $error = "Wrong username or password.";
            require_once 'views/admin/login.php';
        }
    }

    public function logout() {
        session_destroy();
        header('Location: ' . url('/admin'));
        exit;
    }

    public function dashboard() {
        Admin::requireLogin();
        
        $productModel = new Product();
        $products = $productModel->getAll();
        
        require_once 'views/admin/dashboard.php';
    }

    public function add() {
        Admin::requireLogin();
        require_once 'views/admin/add.php';
    }

    public function store() {
        Admin::requireLogin();

        $title = trim($_POST['title']);
        $description = trim($_POST['description']);
        $price = floatval($_POST['price']);
        $image = null;

        if (!empty($_FILES['image']['name'])) {
            $image = $this->uploadImage($_FILES['image']);
        }

        $productModel = new Product();
        $productModel->create([
            'title' => $title,
            'description' => $description,
            'price' => $price,
            'image' => $image
        ]);

        header('Location: ' . url('/admin/dashboard'));
        exit;
    }

    public function edit() {
        Admin::requireLogin();

        $id = intval($_GET['id'] ?? 0);
        $productModel = new Product();
        $product = $productModel->getById($id);

        if (!$product) {
            header('Location: ' . url('/admin/dashboard'));
            exit;
        }

        require_once 'views/admin/edit.php';
    }

    public function update() {
        Admin::requireLogin();

        $id = intval($_GET['id'] ?? 0);
        $productModel = new Product();
        $product = $productModel->getById($id);

        if (!$product) {
            header('Location: ' . url('/admin/dashboard'));
            exit;
        }

        $title = trim($_POST['title']);
        $description = trim($_POST['description']);
        $price = floatval($_POST['price']);
        $image = $product['image'];

        if (!empty($_FILES['image']['name'])) {
            if ($image && file_exists(UPLOAD_DIR . $image)) {
                unlink(UPLOAD_DIR . $image);
            }
            $image = $this->uploadImage($_FILES['image']);
        }

        $productModel->update($id, [
            'title' => $title,
            'description' => $description,
            'price' => $price,
            'image' => $image
        ]);

        header('Location: ' . url('/admin/dashboard'));
        exit;
    }

    public function delete() {
        Admin::requireLogin();

        $id = intval($_GET['id'] ?? 0);
        $productModel = new Product();
        $product = $productModel->getById($id);

        if ($product) {
            if ($product['image'] && file_exists(UPLOAD_DIR . $product['image'])) {
                unlink(UPLOAD_DIR . $product['image']);
            }
            $productModel->delete($id);
        }

        header('Location: ' . url('/admin/dashboard'));
        exit;
    }

    private function uploadImage($file) {
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $filename = time() . "_" . bin2hex(random_bytes(5)) . "." . $ext;
        move_uploaded_file($file['tmp_name'], UPLOAD_DIR . $filename);
        return $filename;
    }
}
