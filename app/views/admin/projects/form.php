<?php 
$isEdit = isset($project['id']);
$actionUrl = $isEdit ? '/admin/projects/update' : '/admin/projects/store';
require_once __DIR__ . '/../../layouts/header.php'; 
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="fw-bold mb-1"><?= sanitize($title) ?></h1>
                    <p class="text-muted">Enter details for your project showcase.</p>
                </div>
                <a href="/admin/projects" class="btn btn-outline-secondary rounded-pill btn-sm px-3">
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

                <form action="<?= $actionUrl ?>" method="POST" enctype="multipart/form-data">
                    <?php if ($isEdit): ?>
                        <input type="hidden" name="id" value="<?= (int)$project['id'] ?>">
                    <?php endif; ?>

                    <div class="mb-3">
                        <label for="title" class="form-label fw-medium text-secondary">Project Title</label>
                        <input type="text" class="form-control border-light-soft bg-light-soft" id="title" name="title" value="<?= isset($project['title']) ? sanitize($project['title']) : '' ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label fw-medium text-secondary">Description</label>
                        <textarea class="form-control border-light-soft bg-light-soft" id="description" name="description" rows="4" required><?= isset($project['description']) ? sanitize($project['description']) : '' ?></textarea>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="demo_url" class="form-label fw-medium text-secondary">Live Demo URL</label>
                            <input type="url" class="form-control border-light-soft bg-light-soft" id="demo_url" name="demo_url" value="<?= isset($project['demo_url']) ? sanitize($project['demo_url']) : '' ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="github_url" class="form-label fw-medium text-secondary">GitHub Repository URL</label>
                            <input type="url" class="form-control border-light-soft bg-light-soft" id="github_url" name="github_url" value="<?= isset($project['github_url']) ? sanitize($project['github_url']) : '' ?>">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="image" class="form-label fw-medium text-secondary">Project Image</label>
                        <?php if ($isEdit && !empty($project['image'])): ?>
                            <div class="mb-2">
                                <img src="<?= '/uploads/' . sanitize($project['image']) ?>" alt="Preview" class="img-thumbnail rounded-3" style="max-height: 120px;">
                            </div>
                        <?php endif; ?>
                        <input class="form-control border-light-soft" type="file" id="image" name="image" accept="image/*">
                    </div>

                    <div class="text-end border-top pt-4">
                        <button type="submit" class="btn btn-primary rounded-pill px-5">
                            <i class="bi bi-save me-1"></i> Save Project
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
