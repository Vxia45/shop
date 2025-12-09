<?php
// Start the session to track logged-in users
session_start();

// Connect to database
require_once 'db/database.php';

// Get the current page URL
$page = $_GET['page'] ?? 'home';

// Check if it's a form submission (POST) or just viewing a page (GET)
$isFormSubmit = $_SERVER['REQUEST_METHOD'] === 'POST';

// --- HOME PAGE ---
if ($page === 'home') {
    require_once 'controllers/HomeController.php';
    $controller = new HomeController();
    $controller->index();
}

// --- ADMIN LOGIN PAGE ---
elseif ($page === 'admin-login' && !$isFormSubmit) {
    require_once 'controllers/AdminController.php';
    $controller = new AdminController();
    $controller->login();
}

// --- ADMIN LOGIN FORM SUBMIT ---
elseif ($page === 'admin-login' && $isFormSubmit) {
    require_once 'controllers/AdminController.php';
    $controller = new AdminController();
    $controller->processLogin();
}

// --- ADMIN DASHBOARD ---
elseif ($page === 'admin-dashboard') {
    require_once 'controllers/AdminController.php';
    $controller = new AdminController();
    $controller->dashboard();
}

// --- ADMIN LOGOUT ---
elseif ($page === 'admin-logout') {
    require_once 'controllers/AdminController.php';
    $controller = new AdminController();
    $controller->logout();
}

// --- ADD PRODUCT PAGE ---
elseif ($page === 'admin-add' && !$isFormSubmit) {
    require_once 'controllers/AdminController.php';
    $controller = new AdminController();
    $controller->add();
}

// --- ADD PRODUCT FORM SUBMIT ---
elseif ($page === 'admin-add' && $isFormSubmit) {
    require_once 'controllers/AdminController.php';
    $controller = new AdminController();
    $controller->store();
}

// --- EDIT PRODUCT PAGE ---
elseif ($page === 'admin-edit' && !$isFormSubmit) {
    require_once 'controllers/AdminController.php';
    $controller = new AdminController();
    $controller->edit();
}

// --- EDIT PRODUCT FORM SUBMIT ---
elseif ($page === 'admin-edit' && $isFormSubmit) {
    require_once 'controllers/AdminController.php';
    $controller = new AdminController();
    $controller->update();
}

// --- DELETE PRODUCT ---
elseif ($page === 'admin-delete') {
    require_once 'controllers/AdminController.php';
    $controller = new AdminController();
    $controller->delete();
}

// --- PAGE NOT FOUND ---
else {
    echo "<h1>404 - Page Not Found</h1>";
    echo "<p>Sorry, the page you're looking for doesn't exist.</p>";
    echo "<a href='index.php?page=home'>Go back home</a>";
}