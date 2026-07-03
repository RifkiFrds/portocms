<?php 
$title = "Manage Experiences";
require_once __DIR__ . '/../../layouts/header.php'; 
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="fw-bold mb-1">Experiences</h1>
                    <p class="text-muted">Manage your corporate history and milestones.</p>
                </div>
                <div>
                    <a href="<?= admin_url('experiences/create') ?>" class="btn btn-primary rounded-pill px-4 btn-sm shadow-sm">
                        <i class="bi bi-plus-circle me-1"></i> Add Experience
                    </a>
                </div>
            </div>

            <!-- List Card -->
            <div class="card border-0 shadow-sm rounded-4 bg-white p-4">
                <?php if (empty($experiences)): ?>
                    <div class="text-center py-5">
                        <i class="bi bi-briefcase text-muted fs-1 mb-3"></i>
                        <p class="text-muted mb-0">No experiences listed yet.</p>
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                                <tr class="text-muted small">
                                    <th>Role / Company</th>
                                    <th>Period</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($experiences as $exp): ?>
                                    <tr>
                                        <td>
                                            <div class="fw-bold"><?= sanitize($exp['role']) ?></div>
                                            <span class="text-primary small"><?= sanitize($exp['company']) ?></span>
                                        </td>
                                        <td>
                                            <span class="badge bg-secondary-soft text-secondary rounded-pill px-3 py-2 fw-medium">
                                                <?= date('M Y', strtotime($exp['start_date'])) ?> - 
                                                <?= $exp['is_current'] ? 'Present' : date('M Y', strtotime($exp['end_date'])) ?>
                                            </span>
                                        </td>
                                        <td class="text-end">
                                            <div class="d-inline-flex gap-2">
                                                <a href="<?= admin_url('experiences/edit?id=' . (int)$exp['id']) ?>" class="btn btn-sm btn-outline-secondary rounded-pill px-3">
                                                    <i class="bi bi-pencil"></i> Edit
                                                </a>
                                                <form action="<?= admin_url('experiences/delete') ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete this experience?');">
                                                    <input type="hidden" name="id" value="<?= (int)$exp['id'] ?>">
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
