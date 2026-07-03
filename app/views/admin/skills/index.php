<?php 
$title = "Manage Skills";
require_once __DIR__ . '/../../layouts/header.php'; 
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="fw-bold mb-1">Skills</h1>
                    <p class="text-muted">Manage your technical strengths and categories.</p>
                </div>
                <div>
                    <a href="/admin/skills/create" class="btn btn-primary rounded-pill px-4 btn-sm shadow-sm">
                        <i class="bi bi-plus-circle me-1"></i> Add Skill
                    </a>
                </div>
            </div>

            <!-- List Card -->
            <div class="card border-0 shadow-sm rounded-4 bg-white p-4">
                <?php if (empty($skills)): ?>
                    <div class="text-center py-5">
                        <i class="bi bi-journal-code text-muted fs-1 mb-3"></i>
                        <p class="text-muted mb-0">No skills listed yet.</p>
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                                <tr class="text-muted small">
                                    <th>Skill Name</th>
                                    <th>Category</th>
                                    <th>Level</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($skills as $skill): ?>
                                    <tr>
                                        <td>
                                            <div class="fw-bold"><?= sanitize($skill['name']) ?></div>
                                        </td>
                                        <td>
                                            <span class="badge bg-light text-dark border rounded-pill px-3 py-1"><?= sanitize($skill['category']) ?></span>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="progress rounded-pill" style="height: 6px; width: 100px;">
                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: <?= (int)$skill['level'] ?>%" aria-valuenow="<?= (int)$skill['level'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span class="small text-muted"><?= (int)$skill['level'] ?>%</span>
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <div class="d-inline-flex gap-2">
                                                <a href="/admin/skills/edit?id=<?= (int)$skill['id'] ?>" class="btn btn-sm btn-outline-secondary rounded-pill px-3">
                                                    <i class="bi bi-pencil"></i> Edit
                                                </a>
                                                <form action="/admin/skills/delete" method="POST" onsubmit="return confirm('Are you sure you want to delete this skill?');">
                                                    <input type="hidden" name="id" value="<?= (int)$skill['id'] ?>">
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
