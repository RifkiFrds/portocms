<?php 
$title = "Manage Projects";
require_once __DIR__ . '/../../layouts/header.php'; 
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="fw-bold mb-1">Projects</h1>
                    <p class="text-muted">Manage your showcase projects and code repositories.</p>
                </div>
                <div>
                    <a href="/admin/projects/create" class="btn btn-primary rounded-pill px-4 btn-sm shadow-sm">
                        <i class="bi bi-plus-circle me-1"></i> Add Project
                    </a>
                </div>
            </div>

            <!-- List Card -->
            <div class="card border-0 shadow-sm rounded-4 bg-white p-4">
                <?php if (empty($projects)): ?>
                    <div class="text-center py-5">
                        <i class="bi bi-kanban text-muted fs-1 mb-3"></i>
                        <p class="text-muted mb-0">No projects listed yet.</p>
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                                <tr class="text-muted small">
                                    <th>Image</th>
                                    <th>Project Title</th>
                                    <th>Urls</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($projects as $proj): ?>
                                    <tr>
                                        <td>
                                            <?php if (!empty($proj['image'])): ?>
                                                <img src="<?= '/uploads/' . sanitize($proj['image']) ?>" alt="Project image" class="img-thumbnail rounded-3" style="width: 80px; height: 50px; object-fit: cover;">
                                            <?php else: ?>
                                                <div class="bg-light rounded-3 d-flex align-items-center justify-content-center text-muted" style="width: 80px; height: 50px;">
                                                    <i class="bi bi-image small"></i>
                                                </div>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <div class="fw-bold"><?= sanitize($proj['title']) ?></div>
                                            <p class="text-muted mb-0 small text-truncate" style="max-width: 300px;"><?= sanitize($proj['description']) ?></p>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column gap-1 small">
                                                <?php if (!empty($proj['demo_url'])): ?>
                                                    <a href="<?= sanitize($proj['demo_url']) ?>" target="_blank" class="text-decoration-none"><i class="bi bi-link-45deg"></i> Demo</a>
                                                <?php endif; ?>
                                                <?php if (!empty($proj['github_url'])): ?>
                                                    <a href="<?= sanitize($proj['github_url']) ?>" target="_blank" class="text-decoration-none text-secondary"><i class="bi bi-github"></i> Repo</a>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <div class="d-inline-flex gap-2">
                                                <a href="/admin/projects/edit?id=<?= (int)$proj['id'] ?>" class="btn btn-sm btn-outline-secondary rounded-pill px-3">
                                                    <i class="bi bi-pencil"></i> Edit
                                                </a>
                                                <form action="/admin/projects/delete" method="POST" onsubmit="return confirm('Are you sure you want to delete this project?');">
                                                    <input type="hidden" name="id" value="<?= (int)$proj['id'] ?>">
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
