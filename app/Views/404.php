<?php 
$title = "Page Not Found";
require_once __DIR__ . '/layouts/header.php'; 
?>

<section class="404-section d-flex align-items-center justify-content-center py-5" style="min-height: 80vh;">
    <div class="container text-center">
        <h1 class="display-1 fw-bold text-primary">404</h1>
        <h3 class="fw-bold mb-3">Oops! Page Not Found</h3>
        <p class="text-secondary mb-5">The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
        <a href="/" class="btn btn-primary rounded-pill px-5 shadow-sm">
            <i class="bi bi-house-door me-2"></i> Back to Homepage
        </a>
    </div>
</section>

<?php require_once __DIR__ . '/layouts/footer.php'; ?>
