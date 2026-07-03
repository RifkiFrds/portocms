<?php

use App\Core\Database;

class CreateTables {
    public function up(): void {
        $db = Database::connect();

        // 1. Admins
        $db->exec("CREATE TABLE IF NOT EXISTS admins (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            email VARCHAR(100) NOT NULL UNIQUE,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

        // 2. Profiles
        $db->exec("CREATE TABLE IF NOT EXISTS profiles (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            title VARCHAR(100) NOT NULL,
            bio TEXT NULL,
            about TEXT NULL,
            photo VARCHAR(255) NULL,
            cv_path VARCHAR(255) NULL,
            contact_email VARCHAR(100) NULL,
            contact_phone VARCHAR(50) NULL,
            contact_address TEXT NULL,
            github_url VARCHAR(255) NULL,
            linkedin_url VARCHAR(255) NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

        // 3. Experiences
        $db->exec("CREATE TABLE IF NOT EXISTS experiences (
            id INT AUTO_INCREMENT PRIMARY KEY,
            company VARCHAR(100) NOT NULL,
            role VARCHAR(100) NOT NULL,
            description TEXT NULL,
            start_date DATE NOT NULL,
            end_date DATE NULL,
            is_current TINYINT(1) DEFAULT 0,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

        // 4. Educations
        $db->exec("CREATE TABLE IF NOT EXISTS educations (
            id INT AUTO_INCREMENT PRIMARY KEY,
            institution VARCHAR(100) NOT NULL,
            major VARCHAR(100) NOT NULL,
            degree VARCHAR(50) NULL,
            gpa VARCHAR(20) NULL,
            start_date DATE NOT NULL,
            end_date DATE NULL,
            is_current TINYINT(1) DEFAULT 0,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

        // 5. Skills
        $db->exec("CREATE TABLE IF NOT EXISTS skills (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            level INT NOT NULL DEFAULT 0, -- percentage 0-100 or rating
            category VARCHAR(50) NOT NULL, -- e.g. Frontend, Backend, Tools
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

        // 6. Projects
        $db->exec("CREATE TABLE IF NOT EXISTS projects (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(100) NOT NULL,
            description TEXT NULL,
            image VARCHAR(255) NULL,
            demo_url VARCHAR(255) NULL,
            github_url VARCHAR(255) NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

        // 7. Certificates
        $db->exec("CREATE TABLE IF NOT EXISTS certificates (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            issuing_organization VARCHAR(255) NOT NULL,
            issue_date DATE NOT NULL,
            credential_url VARCHAR(255) NULL,
            credential_id VARCHAR(100) NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

        echo "All tables created successfully!\n";
    }

    public function down(): void {
        $db = Database::connect();
        $db->exec("DROP TABLE IF EXISTS certificates;");
        $db->exec("DROP TABLE IF EXISTS projects;");
        $db->exec("DROP TABLE IF EXISTS skills;");
        $db->exec("DROP TABLE IF EXISTS educations;");
        $db->exec("DROP TABLE IF EXISTS experiences;");
        $db->exec("DROP TABLE IF EXISTS profiles;");
        $db->exec("DROP TABLE IF EXISTS admins;");
        echo "All tables dropped successfully!\n";
    }
}
