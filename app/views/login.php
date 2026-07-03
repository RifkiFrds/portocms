<?php 
$title = "Admin Login";
require_once __DIR__ . '/layouts/header.php'; 
?>

<section class="login-section d-flex align-items-center justify-content-center py-5" style="min-height: 80vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden bg-white">
                    <div class="p-4 p-lg-5">
                        <div class="text-center mb-4">
                            <div class="login-logo mb-3 bg-primary-soft text-primary rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                <i class="bi bi-person-lock fs-2"></i>
                            </div>
                            <h3 class="fw-bold">CMS Administration</h3>
                            <p class="text-muted small">Please sign in to manage your portfolio</p>
                        </div>
                        
                        <?php if (isset($error)): ?>
                            <div class="alert alert-danger border-0 rounded-3 small py-2 mb-4 d-flex align-items-center" role="alert">
                                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                <div><?= sanitize($error) ?></div>
                            </div>
                        <?php endif; ?>
                        
                        <form action="/login" method="POST">
                            <div class="mb-3">
                                <label for="username" class="form-label fw-medium text-secondary">Username</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-0"><i class="bi bi-person text-muted"></i></span>
                                    <input type="text" class="form-control bg-light border-0" id="username" name="username" value="<?= isset($username) ? sanitize($username) : '' ?>" placeholder="Enter username" required autofocus>
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <label for="password" class="form-label fw-medium text-secondary">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-0"><i class="bi bi-shield-lock text-muted"></i></span>
                                    <input type="password" class="form-control bg-light border-0" id="password" name="password" placeholder="Enter password" required>
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary w-100 rounded-pill py-2 fw-semibold shadow-sm">
                                Sign In <i class="bi bi-box-arrow-in-right ms-1"></i>
                            </button>
                        </form>
                        
                        <div class="text-center mt-4">
                            <a href="/" class="text-decoration-none small text-muted"><i class="bi bi-arrow-left"></i> Back to Portfolio</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/layouts/footer.php'; ?>
