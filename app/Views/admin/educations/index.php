<?php 
$title = "Manage Educations";
require_once __DIR__ . '/../../layouts/header.php'; 
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="fw-bold mb-1">Educations</h1>
                    <p class="text-muted">Manage your academic credentials and degrees.</p>
                </div>
                <div>
                    <a href="<?= admin_url('educations/create') ?>" class="btn btn-primary rounded-pill px-4 btn-sm shadow-sm">
                        <i class="bi bi-plus-circle me-1"></i> Add Education
                    </a>
                </div>
            </div>

            <!-- List Card -->
            <div class="card border-0 shadow-sm rounded-4 bg-white p-4">
                <?php if (empty($educations)): ?>
                    <div class="text-center py-5">
                        <i class="bi bi-mortarboard text-muted fs-1 mb-3"></i>
                        <p class="text-muted mb-0">No education entries listed yet.</p>
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                                <tr class="text-muted small">
                                    <th>Institution</th>
                                    <th>Degree / Major</th>
                                    <th>GPA</th>
                                    <th>Period</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($educations as $edu): ?>
                                    <tr>
                                        <td>
                                            <div class="fw-bold"><?= sanitize($edu['institution']) ?></div>
                                        </td>
                                        <td>
                                            <div class="text-primary fw-medium small"><?= sanitize($edu['degree']) ?> of <?= sanitize($edu['major']) ?></div>
                                        </td>
                                        <td>
                                            <?php if (!empty($edu['gpa'])): ?>
                                                <span class="badge bg-success-soft text-success rounded-pill px-2 py-1"><?= sanitize($edu['gpa']) ?></span>
                                            <?php else: ?>
                                                <span class="text-muted">-</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <span class="badge bg-secondary-soft text-secondary rounded-pill px-3 py-2 fw-medium">
                                                <?= date('Y', strtotime($edu['start_date'])) ?> - 
                                                <?= $edu['is_current'] ? 'Present' : date('Y', strtotime($edu['end_date'])) ?>
                                            </span>
                                        </td>
                                        <td class="text-end">
                                            <div class="d-inline-flex gap-2">
                                                <a href="<?= admin_url('educations/edit?id=' . (int)$edu['id']) ?>" class="btn btn-sm btn-outline-secondary rounded-pill px-3">
                                                    <i class="bi bi-pencil"></i> Edit
                                                </a>
                                                <form action="<?= admin_url('educations/delete') ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete this education entry?');">
                                                    <input type="hidden" name="id" value="<?= (int)$edu['id'] ?>">
                                                    <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill px-3">
                                                        <i class="bi bi-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>
