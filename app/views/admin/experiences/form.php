<?php 
$isEdit = isset($experience['id']);
$actionUrl = $isEdit ? '/admin/experiences/update' : '/admin/experiences/store';
require_once __DIR__ . '/../../layouts/header.php'; 
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="fw-bold mb-1"><?= sanitize($title) ?></h1>
                    <p class="text-muted">Enter details for your work history.</p>
                </div>
                <a href="/admin/experiences" class="btn btn-outline-secondary rounded-pill btn-sm px-3">
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
                        <input type="hidden" name="id" value="<?= (int)$experience['id'] ?>">
                    <?php endif; ?>

                    <div class="mb-3">
                        <label for="company" class="form-label fw-medium text-secondary">Company Name</label>
                        <input type="text" class="form-control border-light-soft bg-light-soft" id="company" name="company" value="<?= isset($experience['company']) ? sanitize($experience['company']) : '' ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label fw-medium text-secondary">Job Title / Role</label>
                        <input type="text" class="form-control border-light-soft bg-light-soft" id="role" name="role" value="<?= isset($experience['role']) ? sanitize($experience['role']) : '' ?>" required>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="start_date" class="form-label fw-medium text-secondary">Start Date</label>
                            <input type="date" class="form-control border-light-soft bg-light-soft" id="start_date" name="start_date" value="<?= isset($experience['start_date']) ? sanitize($experience['start_date']) : '' ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label for="end_date" class="form-label fw-medium text-secondary">End Date</label>
                            <input type="date" class="form-control border-light-soft bg-light-soft" id="end_date" name="end_date" value="<?= isset($experience['end_date']) ? sanitize($experience['end_date']) : '' ?>" <?= (isset($experience['is_current']) && $experience['is_current']) ? 'disabled' : '' ?>>
                        </div>
                    </div>

                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" id="is_current" name="is_current" value="1" <?= (isset($experience['is_current']) && $experience['is_current']) ? 'checked' : '' ?>>
                        <label class="form-check-label text-secondary" for="is_current">
                            I am currently working in this role
                        </label>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="form-label fw-medium text-secondary">Description / Responsibilities</label>
                        <textarea class="form-control border-light-soft bg-light-soft" id="description" name="description" rows="5" required><?= isset($experience['description']) ? sanitize($experience['description']) : '' ?></textarea>
                    </div>

                    <div class="text-end border-top pt-4">
                        <button type="submit" class="btn btn-primary rounded-pill px-5">
                            <i class="bi bi-save me-1"></i> Save Experience
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('is_current').addEventListener('change', function() {
    const endDateInput = document.getElementById('end_date');
    if (this.checked) {
        endDateInput.disabled = true;
        endDateInput.value = '';
    } else {
        endDateInput.disabled = false;
    }
});
</script>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
