<?php

require_once __DIR__ . '/../app/bootstrap.php';

use App\Core\Database;

try {
    // Check if database needs to be created or connection is working
    $config = require __DIR__ . '/../config/database.php';
    
    // Connect to MySQL server without database first to ensure db exists
    $dsn = "mysql:host={$config['host']};port={$config['port']};charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];
    $pdo = new PDO($dsn, $config['username'], $config['password'], $options);
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `{$config['database']}` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;");
    echo "Database `{$config['database']}` verified/created.\n";
    
    // Now load migration file and run it
    require_once __DIR__ . '/migrations/001_create_tables.php';
    
    $migration = new CreateTables();
    $migration->down();
    $migration->up();
    
    echo "Migration completed successfully!\n";
} catch (Exception $e) {
    echo "Migration failed: " . $e->getMessage() . "\n";
    exit(1);
}
