<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'shopdb');
define('DB_USER', 'root');
define('DB_PASS', '');
define('UPLOAD_DIR', __DIR__ . '/../public/uploads/');

if (!is_dir(UPLOAD_DIR)) {
    mkdir(UPLOAD_DIR, 0755, true);
}