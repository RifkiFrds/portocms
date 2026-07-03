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
        $viewPath = __DIR__ . '/../Views/' . $viewName . '.php';
        if (file_exists($viewPath)) {
            require $viewPath;
        } else {
            die("View {$viewName} not found.");
        }
    }
}

if (!function_exists('base_url')) {
    function base_url($path = '') {
        $isHttps = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || 
                   (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') ||
                   (isset($_SERVER['HTTP_X_FORWARDED_PORT']) && $_SERVER['HTTP_X_FORWARDED_PORT'] === '443');
        $protocol = $isHttps ? "https" : "http";
        
        $currentHost = $_SERVER['HTTP_HOST'] ?? 'localhost';
        
        // Remove admin. subdomain if currently on it for base_url
        if (strpos($currentHost, 'admin.') === 0) {
            $host = substr($currentHost, 6);
        } else {
            $host = $currentHost;
        }
        
        $scriptName = $_SERVER['SCRIPT_NAME'] ?? '';
        $baseDir = str_replace('/index.php', '', $scriptName);
        $baseDir = trim($baseDir, '/');
        $baseDir = $baseDir ? '/' . $baseDir : '';
        
        $path = trim($path, '/');
        return $protocol . "://" . $host . $baseDir . ($path !== '' ? '/' . $path : '');
    }
}

if (!function_exists('admin_url')) {
    function admin_url($path = '') {
        $isHttps = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || 
                   (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') ||
                   (isset($_SERVER['HTTP_X_FORWARDED_PORT']) && $_SERVER['HTTP_X_FORWARDED_PORT'] === '443');
        $protocol = $isHttps ? "https" : "http";
        
        $currentHost = $_SERVER['HTTP_HOST'] ?? 'localhost';
        
        // Add admin. subdomain if not present
        if (strpos($currentHost, 'admin.') !== 0 && $currentHost !== 'localhost') {
            $host = 'admin.' . ltrim($currentHost, 'www.');
        } else {
            $host = $currentHost;
        }
        
        $scriptName = $_SERVER['SCRIPT_NAME'] ?? '';
        $baseDir = str_replace('/index.php', '', $scriptName);
        $baseDir = trim($baseDir, '/');
        $baseDir = $baseDir ? '/' . $baseDir : '';
        
        $path = trim($path, '/');
        return $protocol . "://" . $host . $baseDir . ($path !== '' ? '/' . $path : '');
    }
}

if (!function_exists('asset')) {
    function asset($path) {
        // Must be absolute assets on the main domain (to prevent mixed content or relative assets lookup errors)
        return base_url('assets/' . ltrim($path, '/'));
    }
}

if (!function_exists('redirect')) {
    function redirect($url, $isAdmin = false) {
        if (strpos($url, 'http://') !== 0 && strpos($url, 'https://') !== 0) {
            $target = $isAdmin ? admin_url($url) : base_url($url);
            header('Location: ' . $target);
        } else {
            header('Location: ' . $url);
        }
        exit;
    }
}

if (!function_exists('sanitize')) {
    function sanitize($data) {
        return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
    }
}
