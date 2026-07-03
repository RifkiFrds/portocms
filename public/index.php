<?php

// Start session with cross-subdomain support
if (session_status() === PHP_SESSION_NONE) {
    $hostPart = explode(':', $_SERVER['HTTP_HOST'] ?? '')[0];

    if (str_ends_with($hostPart, '.sarip.my.id') || $hostPart === 'sarip.my.id') {
        session_set_cookie_params([
            'lifetime' => 0,
            'path' => '/',
            'domain' => '.sarip.my.id',
            'secure' => true,
            'httponly' => true,
            'samesite' => 'Lax'
        ]);
    }

    session_start();
}

require_once __DIR__ . '/../app/bootstrap.php';

use App\Core\Router;

$router = new Router();

// Load routes dynamically based on subdomain host
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';
if (strpos($host, 'admin.') === 0) {
    $router = require __DIR__ . '/../routes/admin.php';
} else {
    $router = require __DIR__ . '/../routes/web.php';
}

// Dispatch request
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$router->dispatch($uri, $method);
