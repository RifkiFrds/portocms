<?php 
$isEdit = isset($certificate['id']);
$actionUrl = $isEdit ? '/admin/certificates/update' : '/admin/certificates/store';
require_once __DIR__ . '/../../layouts/header.php'; 
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="fw-bold mb-1"><?= sanitize($title) ?></h1>
                    <p class="text-muted">Enter details for your certification / license.</p>
                </div>
                <a href="/admin/certificates" class="btn btn-outline-secondary rounded-pill btn-sm px-3">
                    <i class="bi bi-arrow-left"></i> Back to List
                </a>
            </div>

            <!-- Form Card -->
            <div class="card border-0 shadow-sm rounded-4 bg-white p-4 p-lg-5">
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger border-0 rounded-3 small py-2 mb-4 d-flex align-items-center" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        <div><?= sanitize($error) ?></div>
                    </div>
                <?php endif; ?>

                <form action="<?= $actionUrl ?>" method="POST">
                    <?php if ($isEdit): ?>
                        <input type="hidden" name="id" value="<?= (int)$certificate['id'] ?>">
                    <?php endif; ?>

                    <div class="mb-3">
                        <label for="name" class="form-label fw-medium text-secondary">Certificate Name</label>
                        <input type="text" class="form-control border-light-soft bg-light-soft" id="name" name="name" value="<?= isset($certificate['name']) ? sanitize($certificate['name']) : '' ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="issuing_organization" class="form-label fw-medium text-secondary">Issuing Organization</label>
                        <input type="text" class="form-control border-light-soft bg-light-soft" id="issuing_organization" name="issuing_organization" value="<?= isset($certificate['issuing_organization']) ? sanitize($certificate['issuing_organization']) : '' ?>" required>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="issue_date" class="form-label fw-medium text-secondary">Issue Date</label>
                            <input type="date" class="form-control border-light-soft bg-light-soft" id="issue_date" name="issue_date" value="<?= isset($certificate['issue_date']) ? sanitize($certificate['issue_date']) : '' ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label for="credential_id" class="form-label fw-medium text-secondary">Credential ID</label>
                            <input type="text" class="form-control border-light-soft bg-light-soft" id="credential_id" name="credential_id" value="<?= isset($certificate['credential_id']) ? sanitize($certificate['credential_id']) : '' ?>">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="credential_url" class="form-label fw-medium text-secondary">Credential Verification URL</label>
                        <input type="url" class="form-control border-light-soft bg-light-soft" id="credential_url" name="credential_url" value="<?= isset($certificate['credential_url']) ? sanitize($certificate['credential_url']) : '' ?>">
                    </div>

                    <div class="text-end border-top pt-4">
                        <button type="submit" class="btn btn-primary rounded-pill px-5">
                            <i class="bi bi-save me-1"></i> Save Certificate
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
