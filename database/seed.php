<?php

require_once __DIR__ . '/../app/bootstrap.php';

try {
    require_once __DIR__ . '/seeders/DatabaseSeeder.php';
    
    $seeder = new DatabaseSeeder();
    $seeder->run();
    
    echo "Database seeding finished successfully!\n";
} catch (Exception $e) {
    echo "Seeding failed: " . $e->getMessage() . "\n";
    exit(1);
}
