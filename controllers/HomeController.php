<?php
require_once 'models/Product.php';

class HomeController {
    public function index() {
        $productModel = new Product();
        $products = $productModel->getAll();
        
        require_once 'views/home/index.php';
    }
}