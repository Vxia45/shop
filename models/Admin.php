<?php
require_once 'models/Database.php';

class Admin {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function authenticate($username, $password) {
        $stmt = $this->db->prepare("SELECT * FROM admins WHERE username = ?");
        $stmt->execute([$username]);
        $admin = $stmt->fetch();

        if ($admin && password_verify($password, $admin['password'])) {
            return $admin;
        }
        return false;
    }

    public static function isLoggedIn() {
        return isset($_SESSION['admin_logged']) && $_SESSION['admin_logged'] === true;
    }

    public static function requireLogin() {
        if (!self::isLoggedIn()) {
            header('Location: index.php?page=admin-login');
            exit;
        }
    }
}