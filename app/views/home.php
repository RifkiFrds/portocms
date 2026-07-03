<?php 
$title = "Sarip Saputra - Portfolio";
require_once __DIR__ . '/layouts/header.php'; 
?>

<!-- Hero Section -->
<section id="home" class="hero-section d-flex align-items-center">
    <div class="container text-center text-lg-start">
        <div class="row align-items-center">
            <div class="col-lg-7 order-2 order-lg-1">
                <div class="hero-badge mb-3">
                    <span class="badge bg-primary-soft text-primary px-3 py-2 rounded-pill fw-semibold">Available for Freelance & Full-time</span>
                </div>
                <h1 class="hero-title mb-3">Hi, I'm <span class="text-gradient"><?= sanitize($profile['name'] ?? 'Alexander Joki') ?></span></h1>
                <h2 class="hero-subtitle mb-4 text-muted"><?= sanitize($profile['title'] ?? 'Senior Full Stack Engineer') ?></h2>
                <p class="hero-description mb-5 text-secondary lead">
                    <?= sanitize($profile['bio'] ?? 'Building elegant, scalable web solutions with modern architectures.') ?>
                </p>
                <div class="hero-actions d-flex flex-column flex-sm-row gap-3 justify-content-center justify-content-lg-start">
                    <a href="#contact" class="btn btn-primary btn-lg rounded-pill px-4 py-2 shadow-sm">
                        Get In Touch <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                    <?php if (!empty($profile['cv_path'])): ?>
                        <a href="<?= '/uploads/' . sanitize($profile['cv_path']) ?>" class="btn btn-outline-secondary btn-lg rounded-pill px-4 py-2" download>
                            Download CV <i class="bi bi-download ms-2"></i>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-5 order-1 order-lg-2 text-center mb-5 mb-lg-0">
                <div class="hero-img-wrapper">
                    <?php if (!empty($profile['photo'])): ?>
                        <img src="<?= '/uploads/' . sanitize($profile['photo']) ?>" onerror="this.src='https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=400&h=400&q=80'" alt="<?= sanitize($profile['name'] ?? 'Avatar') ?>" class="img-fluid rounded-circle profile-img shadow-lg">
                    <?php else: ?>
                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=400&h=400&q=80" alt="Avatar" class="img-fluid rounded-circle profile-img shadow-lg">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="about-section py-5 section-divider">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h2 class="section-title mb-2">About Me</h2>
                <div class="section-subtitle-line mx-auto"></div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="card border-0 shadow-sm rounded-4 p-4 p-lg-5 bg-white">
                    <div class="row">
                        <div class="col-lg-4 text-center mb-4 mb-lg-0 border-end-lg d-flex flex-column justify-content-center align-items-center">
                            <div class="about-icon mb-3 bg-primary-soft text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                <i class="bi bi-person-workspace fs-1"></i>
                            </div>
                            <h4 class="fw-bold mb-1"><?= sanitize($profile['name'] ?? 'Alexander Joki') ?></h4>
                            <p class="text-muted"><?= sanitize($profile['title'] ?? 'Senior Software Engineer') ?></p>
                        </div>
                        <div class="col-lg-8 ps-lg-4">
                            <h5 class="fw-bold mb-3">My Story & Professional Approach</h5>
                            <p class="text-secondary mb-4 lead-sm">
                                <?= nl2br(sanitize($profile['about'] ?? 'I specialize in crafting robust backend microservices, performant frontend user interfaces, and automating infrastructure.')) ?>
                            </p>
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center gap-2">
                                        <i class="bi bi-geo-alt-fill text-primary"></i>
                                        <span class="text-muted"><?= sanitize($profile['contact_address'] ?? 'Jakarta, Indonesia') ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center gap-2">
                                        <i class="bi bi-envelope-fill text-primary"></i>
                                        <span class="text-muted"><?= sanitize($profile['contact_email'] ?? 'alexander.joki@example.com') ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Experience Section -->
<section id="experience" class="experience-section py-5 bg-light-soft section-divider">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h2 class="section-title mb-2">Work Experience</h2>
                <div class="section-subtitle-line mx-auto"></div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="timeline">
                    <?php if (empty($experiences)): ?>
                        <div class="text-center py-4">
                            <p class="text-muted">No experience data available yet.</p>
                        </div>
                    <?php else: ?>
                        <?php foreach ($experiences as $exp): ?>
                            <div class="timeline-item position-relative mb-5 ps-4">
                                <div class="timeline-marker position-absolute bg-primary rounded-circle" style="left: -7px; top: 5px; width: 15px; height: 15px;"></div>
                                <div class="card border-0 shadow-sm rounded-4 p-4">
                                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
                                        <div>
                                            <h4 class="fw-bold mb-1"><?= sanitize($exp['role']) ?></h4>
                                            <span class="text-primary fw-semibold"><?= sanitize($exp['company']) ?></span>
                                        </div>
                                        <div class="mt-2 mt-md-0">
                                            <span class="badge bg-secondary-soft text-secondary rounded-pill px-3 py-2 fw-medium">
                                                <?= date('M Y', strtotime($exp['start_date'])) ?> - 
                                                <?= $exp['is_current'] ? 'Present' : date('M Y', strtotime($exp['end_date'])) ?>
                                            </span>
                                        </div>
                                    </div>
                                    <p class="text-secondary mb-0"><?= nl2br(sanitize($exp['description'])) ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Education Section -->
<section id="education" class="education-section py-5 section-divider">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h2 class="section-title mb-2">Education</h2>
                <div class="section-subtitle-line mx-auto"></div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="timeline">
                    <?php if (empty($educations)): ?>
                        <div class="text-center py-4">
                            <p class="text-muted">No education data available yet.</p>
                        </div>
                    <?php else: ?>
                        <?php foreach ($educations as $edu): ?>
                            <div class="timeline-item position-relative mb-5 ps-4">
                                <div class="timeline-marker position-absolute bg-primary rounded-circle" style="left: -7px; top: 5px; width: 15px; height: 15px;"></div>
                                <div class="card border-0 shadow-sm rounded-4 p-4">
                                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
                                        <div>
                                            <h4 class="fw-bold mb-1"><?= sanitize($edu['degree']) ?> - <?= sanitize($edu['major']) ?></h4>
                                            <span class="text-primary fw-semibold"><?= sanitize($edu['institution']) ?></span>
                                        </div>
                                        <div class="mt-2 mt-md-0 d-flex gap-2">
                                            <?php if (!empty($edu['gpa'])): ?>
                                                <span class="badge bg-success-soft text-success rounded-pill px-3 py-2 fw-medium">GPA: <?= sanitize($edu['gpa']) ?></span>
                                            <?php endif; ?>
                                            <span class="badge bg-secondary-soft text-secondary rounded-pill px-3 py-2 fw-medium">
                                                <?= date('Y', strtotime($edu['start_date'])) ?> - 
                                                <?= $edu['is_current'] ? 'Present' : date('Y', strtotime($edu['end_date'])) ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Skills Section -->
<section id="skills" class="skills-section py-5 bg-light-soft section-divider">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h2 class="section-title mb-2">My Skills</h2>
                <div class="section-subtitle-line mx-auto"></div>
            </div>
        </div>
        <div class="row">
            <?php if (empty($skillsGrouped)): ?>
                <div class="col-12 text-center py-4">
                    <p class="text-muted">No skills data available yet.</p>
                </div>
            <?php else: ?>
                <?php foreach ($skillsGrouped as $category => $skills): ?>
                    <div class="col-lg-4 mb-4">
                        <div class="card border-0 shadow-sm rounded-4 p-4 h-100 bg-white">
                            <h4 class="fw-bold mb-4 border-bottom pb-2"><i class="bi bi-code-square text-primary me-2"></i><?= sanitize($category) ?></h4>
                            <div class="d-flex flex-column gap-3">
                                <?php foreach ($skills as $skill): ?>
                                    <div>
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <span class="fw-medium text-secondary"><?= sanitize($skill['name']) ?></span>
                                            <span class="small text-muted"><?= (int)$skill['level'] ?>%</span>
                                        </div>
                                        <div class="progress rounded-pill" style="height: 6px;">
                                            <div class="progress-bar bg-primary rounded-pill" role="progressbar" style="width: <?= (int)$skill['level'] ?>%" aria-valuenow="<?= (int)$skill['level'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Projects Section -->
<section id="projects" class="projects-section py-5 section-divider">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h2 class="section-title mb-2">Featured Projects</h2>
                <div class="section-subtitle-line mx-auto"></div>
            </div>
        </div>
        <div class="row g-4">
            <?php if (empty($projects)): ?>
                <div class="col-12 text-center py-4">
                    <p class="text-muted">No projects data available yet.</p>
                </div>
            <?php else: ?>
                <?php foreach ($projects as $proj): ?>
                    <div class="col-md-6 col-lg-6">
                        <div class="card border-0 shadow-sm rounded-4 overflow-hidden project-card bg-white h-100">
                            <div class="project-img-wrapper position-relative">
                                <?php if (!empty($proj['image'])): ?>
                                    <img src="<?= '/uploads/' . sanitize($proj['image']) ?>" onerror="this.src='https://images.unsplash.com/photo-1555066931-4365d14bab8c?auto=format&fit=crop&w=600&h=350&q=80'" class="card-img-top project-img" alt="<?= sanitize($proj['title']) ?>">
                                <?php else: ?>
                                    <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?auto=format&fit=crop&w=600&h=350&q=80" class="card-img-top project-img" alt="Project image">
                                <?php endif; ?>
                            </div>
                            <div class="card-body p-4 d-flex flex-column justify-content-between">
                                <div>
                                    <h4 class="card-title fw-bold mb-3"><?= sanitize($proj['title']) ?></h4>
                                    <p class="card-text text-secondary mb-4"><?= sanitize($proj['description']) ?></p>
                                </div>
                                <div class="d-flex gap-3">
                                    <?php if (!empty($proj['demo_url'])): ?>
                                        <a href="<?= sanitize($proj['demo_url']) ?>" target="_blank" class="btn btn-primary rounded-pill px-4 btn-sm">
                                            Live Demo <i class="bi bi-box-arrow-up-right ms-1"></i>
                                        </a>
                                    <?php endif; ?>
                                    <?php if (!empty($proj['github_url'])): ?>
                                        <a href="<?= sanitize($proj['github_url']) ?>" target="_blank" class="btn btn-outline-secondary rounded-pill px-4 btn-sm">
                                            <i class="bi bi-github me-1"></i> Repository
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Certificates Section -->
<section id="certificates" class="certificates-section py-5 bg-light-soft section-divider">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h2 class="section-title mb-2">Licenses & Certificates</h2>
                <div class="section-subtitle-line mx-auto"></div>
            </div>
        </div>
        <div class="row g-4">
            <?php if (empty($certificates)): ?>
                <div class="col-12 text-center py-4">
                    <p class="text-muted">No certificates data available yet.</p>
                </div>
            <?php else: ?>
                <?php foreach ($certificates as $cert): ?>
                    <div class="col-md-6 col-lg-6">
                        <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100 d-flex flex-column justify-content-between">
                            <div>
                                <div class="d-flex align-items-center gap-3 mb-3">
                                    <div class="cert-icon-box bg-primary-soft text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                        <i class="bi bi-patch-check-fill fs-4"></i>
                                    </div>
                                    <div>
                                        <h5 class="fw-bold mb-1"><?= sanitize($cert['name']) ?></h5>
                                        <span class="text-muted small"><?= sanitize($cert['issuing_organization']) ?></span>
                                    </div>
                                </div>
                                <p class="text-secondary small mb-3">
                                    <strong>Issue Date:</strong> <?= date('F Y', strtotime($cert['issue_date'])) ?>
                                </p>
                                <?php if (!empty($cert['credential_id'])): ?>
                                    <p class="text-secondary small mb-3">
                                        <strong>Credential ID:</strong> <?= sanitize($cert['credential_id']) ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                            <?php if (!empty($cert['credential_url'])): ?>
                                <div>
                                    <a href="<?= sanitize($cert['credential_url']) ?>" target="_blank" class="btn btn-link text-primary p-0 text-decoration-none fw-semibold">
                                        Verify Credential <i class="bi bi-arrow-up-right-square ms-1"></i>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="contact-section py-5 mb-5">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h2 class="section-title mb-2">Get In Touch</h2>
                <div class="section-subtitle-line mx-auto"></div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4 p-4 p-lg-5 bg-white">
                    <div class="row g-4 align-items-center">
                        <div class="col-md-6 border-end-md">
                            <h4 class="fw-bold mb-4">Contact Information</h4>
                            <div class="d-flex flex-column gap-3">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="contact-icon bg-primary-soft text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                        <i class="bi bi-envelope"></i>
                                    </div>
                                    <div>
                                        <span class="text-muted d-block small">Email</span>
                                        <a href="mailto:<?= sanitize($profile['contact_email'] ?? 'alexander.joki@example.com') ?>" class="text-dark fw-medium text-decoration-none">
                                            <?= sanitize($profile['contact_email'] ?? 'alexander.joki@example.com') ?>
                                        </a>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="contact-icon bg-primary-soft text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                        <i class="bi bi-telephone"></i>
                                    </div>
                                    <div>
                                        <span class="text-muted d-block small">Phone</span>
                                        <span class="text-dark fw-medium"><?= sanitize($profile['contact_phone'] ?? '+62 812-3456-7890') ?></span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="contact-icon bg-primary-soft text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                        <i class="bi bi-geo-alt"></i>
                                    </div>
                                    <div>
                                        <span class="text-muted d-block small">Address</span>
                                        <span class="text-dark fw-medium"><?= sanitize($profile['contact_address'] ?? 'Jakarta, Indonesia') ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ps-md-4">
                            <h4 class="fw-bold mb-4">Social Profiles</h4>
                            <div class="d-flex flex-column gap-3">
                                <?php if (!empty($profile['github_url'])): ?>
                                    <a href="<?= sanitize($profile['github_url']) ?>" target="_blank" class="d-flex align-items-center gap-3 text-dark text-decoration-none hover-social">
                                        <i class="bi bi-github fs-2"></i>
                                        <span class="fw-medium">GitHub Profile</span>
                                    </a>
                                <?php endif; ?>
                                <?php if (!empty($profile['linkedin_url'])): ?>
                                    <a href="<?= sanitize($profile['linkedin_url']) ?>" target="_blank" class="d-flex align-items-center gap-3 text-dark text-decoration-none hover-social">
                                        <i class="bi bi-linkedin fs-2 text-primary"></i>
                                        <span class="fw-medium">LinkedIn Network</span>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/layouts/footer.php'; ?>
