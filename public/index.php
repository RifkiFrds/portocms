<?php

// Start session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../app/bootstrap.php';

use App\Core\Router;

$router = new Router();

// Load routes
require_once __DIR__ . '/../routes/web.php';

// Dispatch request
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$router->dispatch($uri, $method);
