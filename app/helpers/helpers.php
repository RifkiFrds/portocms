<?php

// Load .env variables
if (!function_exists('loadEnv')) {
    function loadEnv($path) {
        if (!file_exists($path)) {
            return false;
        }

        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (strpos(trim($line), '#') === 0) {
                continue;
            }

            list($name, $value) = explode('=', $line, 2);
            $name = trim($name);
            $value = trim($value);

            if (!array_key_exists($name, $_SERVER) && !array_key_exists($name, $_ENV)) {
                putenv(sprintf('%s=%s', $name, $value));
                $_ENV[$name] = $value;
                $_SERVER[$name] = $value;
            }
        }
        return true;
    }
}

if (!function_exists('env')) {
    function env($key, $default = null) {
        $value = getenv($key);
        if ($value === false) {
            return $default;
        }
        return $value;
    }
}

if (!function_exists('view')) {
    function view($viewName, $data = []) {
        extract($data);
        $viewPath = __DIR__ . '/../views/' . $viewName . '.php';
        if (file_exists($viewPath)) {
            require $viewPath;
        } else {
            die("View {$viewName} not found.");
        }
    }
}

if (!function_exists('asset')) {
    function asset($path) {
        // Base path check for relative URLs
        return '/assets/' . ltrim($path, '/');
    }
}

if (!function_exists('redirect')) {
    function redirect($url) {
        header("Location: {$url}");
        exit;
    }
}

if (!function_exists('sanitize')) {
    function sanitize($data) {
        return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
    }
}
