<?php

// Require helpers first (defines env() etc.)
require_once __DIR__ . '/helpers/helpers.php';
require_once __DIR__ . '/helpers/upload.php';

// Load environmental variables
loadEnv(__DIR__ . '/../.env');

// Register Autoloader for App namespace
spl_autoload_register(function ($class) {
    // Prefix for App classes
    $prefix = 'App\\';
    $base_dir = __DIR__ . '/';

    // Does the class use the namespace prefix?
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    // Get the relative class name
    $relative_class = substr($class, $len);

    // Replace namespace separators with directory separators, append with .php
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    // If the file exists, require it
    if (file_exists($file)) {
        require_once $file;
    }
});
