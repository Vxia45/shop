<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'shopdb');
define('DB_USER', 'root');
define('DB_PASS', '');
define('UPLOAD_DIR', __DIR__ . '/../public/uploads/');

// Create uploads directory if it doesn't exist
if (!is_dir(UPLOAD_DIR)) {
    mkdir(UPLOAD_DIR, 0755, true);
}

// Get the base URL path for your project
// For localhost/shop/ this will return "/shop"
// For localhost/ this will return ""
$scriptPath = dirname($_SERVER['SCRIPT_NAME']);
define('BASE_PATH', $scriptPath);

// Helper function to generate URLs
function url($path = '') {
    if ($path === '' || $path === '/') {
        return BASE_PATH . '/index.php';
    }
    return BASE_PATH . '/index.php' . $path;
}

// Helper function to generate asset URLs (CSS, images, etc)
function asset($path) {
    return BASE_PATH . '/' . ltrim($path, '/');
}