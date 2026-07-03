<?php

use App\Core\Router;

$router = new Router();

// Web Routes
$router->get('/', 'HomeController@index');

// Auth Routes (Login tetap di domain utama)
$router->get('/login', 'AuthController@loginForm');
$router->post('/login', 'AuthController@login');

return $router;
