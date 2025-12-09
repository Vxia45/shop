<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'shopdb');
define('DB_USER', 'root');
define('DB_PASS', '');
define('UPLOAD_DIR', __DIR__ . '/../public/uploads/');

if (!is_dir(UPLOAD_DIR)) {
    mkdir(UPLOAD_DIR, 0755, true);
}

// Helper function to generate URLs
function url($path = '') {
    $basePath = dirname($_SERVER['SCRIPT_NAME']);
    $basePath = $basePath === '/' ? '' : $basePath;
    
    if ($path === '' || $path === '/') {
        return $basePath . '/index.php';
    }
    
    return $basePath . '/index.php' . $path;
}

// Helper function to generate asset URLs
function asset($path) {
    $basePath = dirname($_SERVER['SCRIPT_NAME']);
    $basePath = $basePath === '/' ? '' : $basePath;
    return $basePath . '/' . ltrim($path, '/');
}