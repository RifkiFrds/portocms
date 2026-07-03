<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? sanitize($title) . ' | Portfolio' : 'Alexander Joki | Portfolio' ?></title>
    
    <!-- Google Font: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    
    <!-- Custom style.css -->
    <link rel="stylesheet" href="<?= asset('css/style.css') ?>">
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg fixed-top main-navbar">
    <div class="container">
        <a class="navbar-brand" href="/">
            <span class="logo-dot"></span> Sarip Saputra
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <?php if (strpos($_SERVER['REQUEST_URI'], '/admin') === 0): ?>
                    <li class="nav-item"><a class="nav-link" href="/admin"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="/admin/profile"><i class="bi bi-person-bounding-box"></i> Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="/admin/experiences"><i class="bi bi-briefcase"></i> Experiences</a></li>
                    <li class="nav-item"><a class="nav-link" href="/admin/educations"><i class="bi bi-mortarboard"></i> Educations</a></li>
                    <li class="nav-item"><a class="nav-link" href="/admin/skills"><i class="bi bi-journal-code"></i> Skills</a></li>
                    <li class="nav-item"><a class="nav-link" href="/admin/projects"><i class="bi bi-kanban"></i> Projects</a></li>
                    <li class="nav-item"><a class="nav-link" href="/admin/certificates"><i class="bi bi-patch-check"></i> Certificates</a></li>
                    <li class="nav-item"><a class="nav-link" href="/" target="_blank"><i class="bi bi-globe"></i> View Site</a></li>
                    <li class="nav-item ms-lg-3"><a class="btn btn-outline-danger btn-sm" href="/logout"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#experience">Experience</a></li>
                    <li class="nav-item"><a class="nav-link" href="#education">Education</a></li>
                    <li class="nav-item"><a class="nav-link" href="#skills">Skills</a></li>
                    <li class="nav-item"><a class="nav-link" href="#projects">Projects</a></li>
                    <li class="nav-item"><a class="nav-link" href="#certificates">Certificates</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    <?php if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true): ?>
                        <li class="nav-item ms-lg-3"><a class="btn btn-primary btn-sm rounded-pill px-3" href="/admin"><i class="bi bi-speedometer2"></i> CMS Dashboard</a></li>
                    <?php else: ?>
                        <li class="nav-item ms-lg-3"><a class="btn btn-outline-primary btn-sm rounded-pill px-3" href="/login"><i class="bi bi-person-lock"></i> Login</a></li>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<div class="wrapper">
