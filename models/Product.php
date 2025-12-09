<?php
require_once 'models/Database.php';

class Product {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM products ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->db->prepare(
            "INSERT INTO products (title, description, price, image) VALUES (?, ?, ?, ?)"
        );
        return $stmt->execute([
            $data['title'],
            $data['description'],
            $data['price'],
            $data['image']
        ]);
    }

    public function update($id, $data) {
        $stmt = $this->db->prepare(
            "UPDATE products SET title = ?, description = ?, price = ?, image = ? WHERE id = ?"
        );
        return $stmt->execute([
            $data['title'],
            $data['description'],
            $data['price'],
            $data['image'],
            $id
        ]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM products WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
