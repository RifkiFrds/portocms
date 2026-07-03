<?php

use App\Core\Database;

class DatabaseSeeder {
    public function run(): void {
        $db = Database::connect();

        // Clear existing tables
        $db->exec("SET FOREIGN_KEY_CHECKS = 0;");
        $db->exec("TRUNCATE TABLE admins;");
        $db->exec("TRUNCATE TABLE profiles;");
        $db->exec("TRUNCATE TABLE experiences;");
        $db->exec("TRUNCATE TABLE educations;");
        $db->exec("TRUNCATE TABLE skills;");
        $db->exec("TRUNCATE TABLE projects;");
        $db->exec("TRUNCATE TABLE certificates;");
        $db->exec("SET FOREIGN_KEY_CHECKS = 1;");

        // 1. Admin
        $hashedPassword = password_hash('admin123', PASSWORD_BCRYPT);
        $stmt = $db->prepare("INSERT INTO admins (username, password, email) VALUES (:username, :password, :email)");
        $stmt->execute([
            'username' => 'admin',
            'password' => $hashedPassword,
            'email' => 'admin@portocms.com'
        ]);

        // 2. Profile
        $stmt = $db->prepare("INSERT INTO profiles (name, title, bio, about, photo, cv_path, contact_email, contact_phone, contact_address, github_url, linkedin_url) VALUES (:name, :title, :bio, :about, :photo, :cv_path, :contact_email, :contact_phone, :contact_address, :github_url, :linkedin_url)");
        $stmt->execute([
            'name' => 'Sarip Saputra',
            'title' => 'Senior Full Stack Engineer',
            'bio' => 'Building elegant, scalable web solutions with modern architectures. Focused on clean code and developer experience.',
            'about' => 'With over a decade of experience in software engineering, I specialize in crafting robust backend microservices, performant frontend user interfaces, and automating infrastructure. I believe in writing readable, maintainable code and building products that make a real difference.',
            'photo' => 'profile.jpg',
            'cv_path' => 'alexander-joki-cv.pdf',
            'contact_email' => 'alexander.joki@example.com',
            'contact_phone' => '+62 812-3456-7890',
            'contact_address' => 'Jakarta, Indonesia',
            'github_url' => 'https://github.com',
            'linkedin_url' => 'https://linkedin.com'
        ]);

        // 3. Experiences
        $stmt = $db->prepare("INSERT INTO experiences (company, role, description, start_date, end_date, is_current) VALUES (:company, :role, :description, :start_date, :end_date, :is_current)");
        
        $stmt->execute([
            'company' => 'Vercel Tech',
            'role' => 'Lead Backend Engineer',
            'description' => 'Architected and optimized scalable microservices handling millions of requests daily. Managed a team of 5 backend developers.',
            'start_date' => '2023-01-01',
            'end_date' => null,
            'is_current' => 1
        ]);
        
        $stmt->execute([
            'company' => 'Stripe Solutions',
            'role' => 'Senior Software Developer',
            'description' => 'Integrated secure payment gateways and refactored core transaction APIs. Improved API throughput by 35% through query optimization and database indexing.',
            'start_date' => '2020-03-01',
            'end_date' => '2022-12-31',
            'is_current' => 0
        ]);

        // 4. Educations
        $stmt = $db->prepare("INSERT INTO educations (institution, major, degree, gpa, start_date, end_date, is_current) VALUES (:institution, :major, :degree, :gpa, :start_date, :end_date, :is_current)");
        
        $stmt->execute([
            'institution' => 'University of Indonesia',
            'major' => 'Computer Science',
            'degree' => 'Bachelor of Science',
            'gpa' => '3.85 / 4.00',
            'start_date' => '2015-09-01',
            'end_date' => '2019-07-01',
            'is_current' => 0
        ]);

        // 5. Skills
        $stmt = $db->prepare("INSERT INTO skills (name, level, category) VALUES (:name, :level, :category)");
        
        // Backend Skills
        $stmt->execute(['name' => 'PHP Native / PDO', 'level' => 95, 'category' => 'Backend']);
        $stmt->execute(['name' => 'MySQL / Database Tuning', 'level' => 90, 'category' => 'Backend']);
        $stmt->execute(['name' => 'Node.js (Express)', 'level' => 80, 'category' => 'Backend']);
        
        // Frontend Skills
        $stmt->execute(['name' => 'HTML5 / CSS3 / ES6', 'level' => 90, 'category' => 'Frontend']);
        $stmt->execute(['name' => 'Bootstrap 5', 'level' => 95, 'category' => 'Frontend']);
        $stmt->execute(['name' => 'React.js / Vanilla JS', 'level' => 85, 'category' => 'Frontend']);
        
        // Tools/Others Skills
        $stmt->execute(['name' => 'Docker / Compose', 'level' => 85, 'category' => 'DevOps']);
        $stmt->execute(['name' => 'Git / GitHub CI-CD', 'level' => 90, 'category' => 'DevOps']);
        $stmt->execute(['name' => 'Linux / Nginx', 'level' => 80, 'category' => 'DevOps']);

        // 6. Projects
        $stmt = $db->prepare("INSERT INTO projects (title, description, image, demo_url, github_url) VALUES (:title, :description, :image, :demo_url, :github_url)");
        
        $stmt->execute([
            'title' => 'E-Commerce Microservices Platform',
            'description' => 'A robust e-commerce engine split into self-contained microservices using RESTful APIs, and featuring real-time caching with Redis.',
            'image' => 'project1.jpg',
            'demo_url' => 'https://example.com/demo1',
            'github_url' => 'https://github.com'
        ]);

        $stmt->execute([
            'title' => 'Responsive Admin CMS Framework',
            'description' => 'A lightweight PHP native template administration panel featuring secure session routing, file uploading, and modular dashboards.',
            'image' => 'project2.jpg',
            'demo_url' => 'https://example.com/demo2',
            'github_url' => 'https://github.com'
        ]);

        // 7. Certificates
        $stmt = $db->prepare("INSERT INTO certificates (name, issuing_organization, issue_date, credential_url, credential_id) VALUES (:name, :issuing_organization, :issue_date, :credential_url, :credential_id)");
        
        $stmt->execute([
            'name' => 'AWS Certified Solutions Architect – Associate',
            'issuing_organization' => 'Amazon Web Services',
            'issue_date' => '2024-05-15',
            'credential_url' => 'https://aws.amazon.com',
            'credential_id' => 'AWS-ASA-9938'
        ]);

        $stmt->execute([
            'name' => 'Certified ScrumMaster (CSM)',
            'issuing_organization' => 'Scrum Alliance',
            'issue_date' => '2023-11-20',
            'credential_url' => 'https://scrumalliance.org',
            'credential_id' => 'CSM-882741'
        ]);

        echo "Seeding completed successfully!\n";
    }
}
