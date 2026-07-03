<?php 
$title = "Admin Dashboard";
require_once __DIR__ . '/../layouts/header.php'; 
?>

<div class="container py-5">
    <!-- Dashboard Header -->
    <div class="row mb-5 align-items-center">
        <div class="col-md-8">
            <h1 class="fw-bold mb-1">Welcome back, <?= sanitize($_SESSION['admin_username'] ?? 'Admin') ?>!</h1>
            <p class="text-muted">Manage your portfolio website content from this dashboard.</p>
        </div>
        <div class="col-md-4 text-md-end">
            <a href="/" target="_blank" class="btn btn-outline-primary rounded-pill px-4">
                <i class="bi bi-eye me-1"></i> Live Portfolio
            </a>
        </div>
    </div>

    <!-- Quick Stats/Cards -->
    <div class="row g-4 mb-5">
        <div class="col-md-4 col-lg-3">
            <div class="card border-0 shadow-sm rounded-4 p-4 text-center h-100 bg-white">
                <div class="stat-icon bg-primary-soft text-primary mx-auto mb-3 rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                    <i class="bi bi-briefcase fs-4"></i>
                </div>
                <h6 class="text-muted fw-normal mb-1">Experiences</h6>
                <p class="h3 fw-bold mb-0 text-dark">Active</p>
            </div>
        </div>
        <div class="col-md-4 col-lg-3">
            <div class="card border-0 shadow-sm rounded-4 p-4 text-center h-100 bg-white">
                <div class="stat-icon bg-success-soft text-success mx-auto mb-3 rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                    <i class="bi bi-code-slash fs-4"></i>
                </div>
                <h6 class="text-muted fw-normal mb-1">Projects</h6>
                <p class="h3 fw-bold mb-0 text-dark">Active</p>
            </div>
        </div>
        <div class="col-md-4 col-lg-3">
            <div class="card border-0 shadow-sm rounded-4 p-4 text-center h-100 bg-white">
                <div class="stat-icon bg-info-soft text-info mx-auto mb-3 rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                    <i class="bi bi-patch-check fs-4"></i>
                </div>
                <h6 class="text-muted fw-normal mb-1">Certificates</h6>
                <p class="h3 fw-bold mb-0 text-dark">Active</p>
            </div>
        </div>
        <div class="col-md-4 col-lg-3">
            <div class="card border-0 shadow-sm rounded-4 p-4 text-center h-100 bg-white">
                <div class="stat-icon bg-warning-soft text-warning mx-auto mb-3 rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                    <i class="bi bi-person-circle fs-4"></i>
                </div>
                <h6 class="text-muted fw-normal mb-1">Profile</h6>
                <p class="h3 fw-bold mb-0 text-dark">Active</p>
            </div>
        </div>
    </div>

    <!-- Management Modules Outline -->
    <div class="card border-0 shadow-sm rounded-4 bg-white p-4 p-lg-5">
        <h4 class="fw-bold mb-4"><i class="bi bi-sliders text-primary me-2"></i>Portfolio CMS Content Manager</h4>
        <p class="text-secondary mb-4">Click below to manage each section of your personal portfolio website. (Note: CRUD functionality will be implemented in subsequent phases).</p>
        
        <div class="row g-3">
            <div class="col-md-6">
                <div class="d-flex align-items-center p-3 border rounded-3 hover-shadow-sm transition-all bg-light-soft">
                    <i class="bi bi-person-bounding-box text-primary fs-3 me-3"></i>
                    <div>
                        <h6 class="fw-bold mb-1">Manage Profile</h6>
                        <span class="text-muted small">Update bio, avatar, contact details, and CV.</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-center p-3 border rounded-3 hover-shadow-sm transition-all bg-light-soft">
                    <i class="bi bi-briefcase-fill text-primary fs-3 me-3"></i>
                    <div>
                        <h6 class="fw-bold mb-1">Manage Experience</h6>
                        <span class="text-muted small">Add, update, or delete work experience timeline.</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-center p-3 border rounded-3 hover-shadow-sm transition-all bg-light-soft">
                    <i class="bi bi-mortarboard-fill text-primary fs-3 me-3"></i>
                    <div>
                        <h6 class="fw-bold mb-1">Manage Education</h6>
                        <span class="text-muted small">Update institutions, degrees, and GPA info.</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-center p-3 border rounded-3 hover-shadow-sm transition-all bg-light-soft">
                    <i class="bi bi-journal-code text-primary fs-3 me-3"></i>
                    <div>
                        <h6 class="fw-bold mb-1">Manage Skills</h6>
                        <span class="text-muted small">Group skills by categories and set proficiency.</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-center p-3 border rounded-3 hover-shadow-sm transition-all bg-light-soft">
                    <i class="bi bi-kanban-fill text-primary fs-3 me-3"></i>
                    <div>
                        <h6 class="fw-bold mb-1">Manage Projects</h6>
                        <span class="text-muted small">Update live project showcases and repo links.</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-center p-3 border rounded-3 hover-shadow-sm transition-all bg-light-soft">
                    <i class="bi bi-patch-check-fill text-primary fs-3 me-3"></i>
                    <div>
                        <h6 class="fw-bold mb-1">Manage Certificates</h6>
                        <span class="text-muted small">Manage credentials, issuing institutions, and verification URLs.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
