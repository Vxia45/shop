<?php
session_start();
require_once 'config/database.php';
require_once 'core/Router.php';

$router = new Router();

// Define routes
$router->add('GET', '/', 'HomeController', 'index');
$router->add('GET', '/admin', 'AdminController', 'login');
$router->add('POST', '/admin/login', 'AdminController', 'processLogin');
$router->add('GET', '/admin/dashboard', 'AdminController', 'dashboard');
$router->add('GET', '/admin/logout', 'AdminController', 'logout');
$router->add('GET', '/admin/add', 'AdminController', 'add');
$router->add('POST', '/admin/add', 'AdminController', 'store');
$router->add('GET', '/admin/edit', 'AdminController', 'edit');
$router->add('POST', '/admin/edit', 'AdminController', 'update');
$router->add('GET', '/admin/delete', 'AdminController', 'delete');

$router->dispatch();
