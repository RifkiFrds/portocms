<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Admin;

class AuthController extends Controller {
    public function loginForm(): void {
        if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
            redirect('/', true);
        }
        view('login');
    }

    public function login(): void {
        if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
            redirect('/', true);
        }

        $username = trim($_POST['username'] ?? '');
        $password = trim($_POST['password'] ?? '');

        if (empty($username) || empty($password)) {
            view('login', ['error' => 'Username and password are required.']);
            return;
        }

        $adminModel = new Admin();
        $admin = $adminModel->findByUsername($username);

        if ($admin && password_verify($password, $admin['password'])) {
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_username'] = $admin['username'];
            redirect('/', true);
        } else {
            view('login', ['error' => 'Invalid username or password.', 'username' => $username]);
        }
    }

    public function logout(): void {
        $_SESSION = [];
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();
        redirect('login', false);
    }
}
