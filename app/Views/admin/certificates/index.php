<?php 
$title = "Manage Certificates";
require_once __DIR__ . '/../../layouts/header.php'; 
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="fw-bold mb-1">Certificates</h1>
                    <p class="text-muted">Manage your professional licenses and credentials.</p>
                </div>
                <div>
                    <a href="<?= admin_url('certificates/create') ?>" class="btn btn-primary rounded-pill px-4 btn-sm shadow-sm">
                        <i class="bi bi-plus-circle me-1"></i> Add Certificate
                    </a>
                </div>
            </div>

            <!-- List Card -->
            <div class="card border-0 shadow-sm rounded-4 bg-white p-4">
                <?php if (empty($certificates)): ?>
                    <div class="text-center py-5">
                        <i class="bi bi-patch-check text-muted fs-1 mb-3"></i>
                        <p class="text-muted mb-0">No certificates listed yet.</p>
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                                <tr class="text-muted small">
                                    <th>Name</th>
                                    <th>Issuing Organization</th>
                                    <th>Issue Date</th>
                                    <th>Credential ID</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($certificates as $cert): ?>
                                    <tr>
                                        <td>
                                            <div class="fw-bold"><?= sanitize($cert['name']) ?></div>
                                            <?php if (!empty($cert['credential_url'])): ?>
                                                <a href="<?= sanitize($cert['credential_url']) ?>" target="_blank" class="small text-decoration-none"><i class="bi bi-box-arrow-up-right"></i> Verify Link</a>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <span class="text-secondary small"><?= sanitize($cert['issuing_organization']) ?></span>
                                        </td>
                                        <td>
                                            <span class="small text-muted"><?= date('M Y', strtotime($cert['issue_date'])) ?></span>
                                        </td>
                                        <td>
                                            <span class="small font-monospace text-muted"><?= !empty($cert['credential_id']) ? sanitize($cert['credential_id']) : '-' ?></span>
                                        </td>
                                        <td class="text-end">
                                            <div class="d-inline-flex gap-2">
                                                <a href="<?= admin_url('certificates/edit?id=' . (int)$cert['id']) ?>" class="btn btn-sm btn-outline-secondary rounded-pill px-3">
                                                    <i class="bi bi-pencil"></i> Edit
                                                </a>
                                                <form action="<?= admin_url('certificates/delete') ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete this certificate?');">
                                                    <input type="hidden" name="id" value="<?= (int)$cert['id'] ?>">
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
