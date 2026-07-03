<?php 
$title = "Manage Profile";
require_once __DIR__ . '/../layouts/header.php'; 
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="fw-bold mb-1">Manage Profile</h1>
                    <p class="text-muted">Update your general details, bio, avatar, and resume.</p>
                </div>
                <a href="<?= admin_url('') ?>" class="btn btn-outline-secondary rounded-pill btn-sm px-3">
                    <i class="bi bi-arrow-left"></i> Back to Dashboard
                </a>
            </div>

            <!-- Profile Edit Form -->
            <div class="card border-0 shadow-sm rounded-4 bg-white p-4 p-lg-5">
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger border-0 rounded-3 small py-2 mb-4 d-flex align-items-center" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        <div><?= sanitize($error) ?></div>
                    </div>
                <?php endif; ?>

                <form action="<?= admin_url('profile') ?>" method="POST" enctype="multipart/form-data">
                    <div class="row g-4">
                        <!-- Left Column: Details -->
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="name" class="form-label fw-medium text-secondary">Full Name</label>
                                <input type="text" class="form-control border-light-soft bg-light-soft" id="name" name="name" value="<?= isset($profile['name']) ? sanitize($profile['name']) : '' ?>" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="title" class="form-label fw-medium text-secondary">Professional Title</label>
                                <input type="text" class="form-control border-light-soft bg-light-soft" id="title" name="title" value="<?= isset($profile['title']) ? sanitize($profile['title']) : '' ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="bio" class="form-label fw-medium text-secondary">Short Bio (Hero section)</label>
                                <textarea class="form-control border-light-soft bg-light-soft" id="bio" name="bio" rows="3" required><?= isset($profile['bio']) ? sanitize($profile['bio']) : '' ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="about" class="form-label fw-medium text-secondary">About Me (Detail narrative)</label>
                                <textarea class="form-control border-light-soft bg-light-soft" id="about" name="about" rows="5" required><?= isset($profile['about']) ? sanitize($profile['about']) : '' ?></textarea>
                            </div>
                        </div>

                        <!-- Right Column: Avatar, CV & Links -->
                        <div class="col-md-4">
                            <!-- Image Upload & Preview -->
                            <div class="mb-4 text-center">
                                <label class="form-label fw-medium text-secondary d-block text-start">Profile Photo</label>
                                <div class="mb-3">
                                    <?php if (!empty($profile['photo'])): ?>
                                        <img src="<?= '/uploads/' . sanitize($profile['photo']) ?>" alt="Avatar" class="img-thumbnail rounded-circle" style="width: 120px; height: 120px; object-fit: cover;">
                                    <?php else: ?>
                                        <div class="bg-light rounded-circle mx-auto d-flex align-items-center justify-content-center text-muted" style="width: 120px; height: 120px; border: 2px dashed #ccc;">
                                            <i class="bi bi-image fs-1"></i>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <input class="form-control form-control-sm border-light-soft" type="file" id="photo" name="photo" accept="image/*">
                            </div>

                            <!-- CV Upload -->
                            <div class="mb-4">
                                <label for="cv_path" class="form-label fw-medium text-secondary">Upload CV (PDF)</label>
                                <?php if (!empty($profile['cv_path'])): ?>
                                    <div class="mb-2 small text-success">
                                        <i class="bi bi-file-earmark-check-fill"></i> Current: <?= sanitize($profile['cv_path']) ?>
                                    </div>
                                <?php endif; ?>
                                <input class="form-control form-control-sm border-light-soft" type="file" id="cv_path" name="cv_path" accept="application/pdf">
                            </div>

                            <hr class="my-4">

                            <!-- Contact details -->
                            <div class="mb-3">
                                <label for="contact_email" class="form-label fw-medium text-secondary">Contact Email</label>
                                <input type="email" class="form-control border-light-soft bg-light-soft" id="contact_email" name="contact_email" value="<?= isset($profile['contact_email']) ? sanitize($profile['contact_email']) : '' ?>">
                            </div>
                            <div class="mb-3">
                                <label for="contact_phone" class="form-label fw-medium text-secondary">Contact Phone</label>
                                <input type="text" class="form-control border-light-soft bg-light-soft" id="contact_phone" name="contact_phone" value="<?= isset($profile['contact_phone']) ? sanitize($profile['contact_phone']) : '' ?>">
                            </div>
                            <div class="mb-3">
                                <label for="contact_address" class="form-label fw-medium text-secondary">Contact Address</label>
                                <input type="text" class="form-control border-light-soft bg-light-soft" id="contact_address" name="contact_address" value="<?= isset($profile['contact_address']) ? sanitize($profile['contact_address']) : '' ?>">
                            </div>

                            <!-- Social URLs -->
                            <div class="mb-3">
                                <label for="github_url" class="form-label fw-medium text-secondary">GitHub URL</label>
                                <input type="url" class="form-control border-light-soft bg-light-soft" id="github_url" name="github_url" value="<?= isset($profile['github_url']) ? sanitize($profile['github_url']) : '' ?>">
                            </div>
                            <div class="mb-3">
                                <label for="linkedin_url" class="form-label fw-medium text-secondary">LinkedIn URL</label>
                                <input type="url" class="form-control border-light-soft bg-light-soft" id="linkedin_url" name="linkedin_url" value="<?= isset($profile['linkedin_url']) ? sanitize($profile['linkedin_url']) : '' ?>">
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 border-top pt-4 text-end">
                        <button type="submit" class="btn btn-primary rounded-pill px-5">
                            <i class="bi bi-save me-1"></i> Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
