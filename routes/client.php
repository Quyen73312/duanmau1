<?php
require_once PATH_CONTROLLER_CLIENT . 'AuthController.php';
require_once PATH_CONTROLLER_CLIENT . 'HomeController.php'; // nếu có HomeController

$action = $_GET['action'] ?? '/';

try {
    match ($action) {
        '/' => (new HomeController)->index(),
        'category' => (new HomeController)->category(),
        'login' => (new AuthController)->showLogin(),
        'register' => (new AuthController)->showRegister(),
        'do-login' => (new AuthController)->login(),
        'do-register' => (new AuthController)->register(),
        'logout' => (new AuthController)->logout(),
        default => (new HomeController)->index(),
    };
} catch(Throwable $e){
    echo "<h1>Lỗi: " . $e->getMessage() . "</h1>";
    exit();
}
