<?php 
$isEdit = isset($skill['id']);
$actionUrl = $isEdit ? '/admin/skills/update' : '/admin/skills/store';
require_once __DIR__ . '/../../layouts/header.php'; 
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="fw-bold mb-1"><?= sanitize($title) ?></h1>
                    <p class="text-muted">Enter details for your skill.</p>
                </div>
                <a href="/admin/skills" class="btn btn-outline-secondary rounded-pill btn-sm px-3">
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
                        <input type="hidden" name="id" value="<?= (int)$skill['id'] ?>">
                    <?php endif; ?>

                    <div class="mb-3">
                        <label for="name" class="form-label fw-medium text-secondary">Skill Name (e.g. PHP, React.js)</label>
                        <input type="text" class="form-control border-light-soft bg-light-soft" id="name" name="name" value="<?= isset($skill['name']) ? sanitize($skill['name']) : '' ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label fw-medium text-secondary">Category (e.g. Frontend, Backend, DevOps, Design)</label>
                        <input type="text" class="form-control border-light-soft bg-light-soft" id="category" name="category" value="<?= isset($skill['category']) ? sanitize($skill['category']) : '' ?>" placeholder="e.g. Backend" required>
                    </div>

                    <div class="mb-4">
                        <label for="level" class="form-label fw-medium text-secondary">Level of Proficiency (0-100%)</label>
                        <div class="d-flex align-items-center gap-3">
                            <input type="range" class="form-range flex-grow-1" id="level" name="level" min="0" max="100" value="<?= isset($skill['level']) ? (int)$skill['level'] : '80' ?>">
                            <span id="level-display" class="fw-bold text-primary" style="min-width: 40px;">80%</span>
                        </div>
                    </div>

                    <div class="text-end border-top pt-4">
                        <button type="submit" class="btn btn-primary rounded-pill px-5">
                            <i class="bi bi-save me-1"></i> Save Skill
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
const rangeInput = document.getElementById('level');
const displaySpan = document.getElementById('level-display');

// Update value initially
displaySpan.textContent = rangeInput.value + '%';

rangeInput.addEventListener('input', function() {
    displaySpan.textContent = this.value + '%';
});
</script>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
