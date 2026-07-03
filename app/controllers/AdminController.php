<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Profile;
use App\Models\Experience;
use App\Models\Education;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Certificate;

class AdminController extends Controller {
    
    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->checkAuth();
    }

    private function checkAuth(): void {
        if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
            redirect('/login');
        }
    }

    public function index(): void {
        view('admin/dashboard');
    }

    // ==========================================
    // PROFILE MANAGEMENT
    // ==========================================
    public function editProfile(): void {
        $profileModel = new Profile();
        $profile = $profileModel->getFirst();
        view('admin/profile', ['profile' => $profile]);
    }

    public function updateProfile(): void {
        $profileModel = new Profile();
        $profile = $profileModel->getFirst();

        $data = [
            'name' => trim($_POST['name'] ?? ''),
            'title' => trim($_POST['title'] ?? ''),
            'bio' => trim($_POST['bio'] ?? ''),
            'about' => trim($_POST['about'] ?? ''),
            'contact_email' => trim($_POST['contact_email'] ?? ''),
            'contact_phone' => trim($_POST['contact_phone'] ?? ''),
            'contact_address' => trim($_POST['contact_address'] ?? ''),
            'github_url' => trim($_POST['github_url'] ?? ''),
            'linkedin_url' => trim($_POST['linkedin_url'] ?? ''),
        ];

        // Validate
        if (empty($data['name']) || empty($data['title'])) {
            view('admin/profile', ['profile' => $profile, 'error' => 'Name and Title are required.']);
            return;
        }

        // Handle Photo Upload
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
            $uploadedPhoto = uploadFile($_FILES['photo'], 'public/uploads', ['jpg', 'jpeg', 'png', 'gif']);
            if ($uploadedPhoto) {
                $data['photo'] = $uploadedPhoto;
            }
        }

        // Handle CV Upload
        if (isset($_FILES['cv_path']) && $_FILES['cv_path']['error'] === UPLOAD_ERR_OK) {
            $uploadedCv = uploadFile($_FILES['cv_path'], 'public/uploads', ['pdf', 'doc', 'docx']);
            if ($uploadedCv) {
                $data['cv_path'] = $uploadedCv;
            }
        }

        if ($profile) {
            $profileModel->update((int)$profile['id'], $data);
        } else {
            $profileModel->create($data);
        }

        redirect('/admin/profile');
    }

    // ==========================================
    // EXPERIENCES CRUD
    // ==========================================
    public function experiencesIndex(): void {
        $expModel = new Experience();
        $experiences = $expModel->allOrdered();
        view('admin/experiences/index', ['experiences' => $experiences]);
    }

    public function experienceCreate(): void {
        view('admin/experiences/form', ['title' => 'Add Experience']);
    }

    public function experienceStore(): void {
        $data = [
            'company' => trim($_POST['company'] ?? ''),
            'role' => trim($_POST['role'] ?? ''),
            'description' => trim($_POST['description'] ?? ''),
            'start_date' => trim($_POST['start_date'] ?? ''),
            'end_date' => !empty($_POST['end_date']) ? trim($_POST['end_date']) : null,
            'is_current' => isset($_POST['is_current']) ? 1 : 0
        ];

        if (empty($data['company']) || empty($data['role']) || empty($data['start_date'])) {
            view('admin/experiences/form', ['title' => 'Add Experience', 'error' => 'Company, Role, and Start Date are required.', 'experience' => $data]);
            return;
        }

        $expModel = new Experience();
        $expModel->create($data);
        redirect('/admin/experiences');
    }

    public function experienceEdit(): void {
        $id = (int)($_GET['id'] ?? 0);
        $expModel = new Experience();
        $experience = $expModel->find($id);

        if (!$experience) {
            redirect('/admin/experiences');
        }

        view('admin/experiences/form', ['title' => 'Edit Experience', 'experience' => $experience]);
    }

    public function experienceUpdate(): void {
        $id = (int)($_POST['id'] ?? 0);
        $data = [
            'company' => trim($_POST['company'] ?? ''),
            'role' => trim($_POST['role'] ?? ''),
            'description' => trim($_POST['description'] ?? ''),
            'start_date' => trim($_POST['start_date'] ?? ''),
            'end_date' => !empty($_POST['end_date']) ? trim($_POST['end_date']) : null,
            'is_current' => isset($_POST['is_current']) ? 1 : 0
        ];

        if (empty($data['company']) || empty($data['role']) || empty($data['start_date'])) {
            $data['id'] = $id;
            view('admin/experiences/form', ['title' => 'Edit Experience', 'error' => 'Company, Role, and Start Date are required.', 'experience' => $data]);
            return;
        }

        $expModel = new Experience();
        $expModel->update($id, $data);
        redirect('/admin/experiences');
    }

    public function experienceDelete(): void {
        $id = (int)($_POST['id'] ?? 0);
        $expModel = new Experience();
        $expModel->delete($id);
        redirect('/admin/experiences');
    }

    // ==========================================
    // EDUCATIONS CRUD
    // ==========================================
    public function educationsIndex(): void {
        $eduModel = new Education();
        $educations = $eduModel->allOrdered();
        view('admin/educations/index', ['educations' => $educations]);
    }

    public function educationCreate(): void {
        view('admin/educations/form', ['title' => 'Add Education']);
    }

    public function educationStore(): void {
        $data = [
            'institution' => trim($_POST['institution'] ?? ''),
            'major' => trim($_POST['major'] ?? ''),
            'degree' => trim($_POST['degree'] ?? ''),
            'gpa' => trim($_POST['gpa'] ?? ''),
            'start_date' => trim($_POST['start_date'] ?? ''),
            'end_date' => !empty($_POST['end_date']) ? trim($_POST['end_date']) : null,
            'is_current' => isset($_POST['is_current']) ? 1 : 0
        ];

        if (empty($data['institution']) || empty($data['major']) || empty($data['start_date'])) {
            view('admin/educations/form', ['title' => 'Add Education', 'error' => 'Institution, Major, and Start Date are required.', 'education' => $data]);
            return;
        }

        $eduModel = new Education();
        $eduModel->create($data);
        redirect('/admin/educations');
    }

    public function educationEdit(): void {
        $id = (int)($_GET['id'] ?? 0);
        $eduModel = new Education();
        $education = $eduModel->find($id);

        if (!$education) {
            redirect('/admin/educations');
        }

        view('admin/educations/form', ['title' => 'Edit Education', 'education' => $education]);
    }

    public function educationUpdate(): void {
        $id = (int)($_POST['id'] ?? 0);
        $data = [
            'institution' => trim($_POST['institution'] ?? ''),
            'major' => trim($_POST['major'] ?? ''),
            'degree' => trim($_POST['degree'] ?? ''),
            'gpa' => trim($_POST['gpa'] ?? ''),
            'start_date' => trim($_POST['start_date'] ?? ''),
            'end_date' => !empty($_POST['end_date']) ? trim($_POST['end_date']) : null,
            'is_current' => isset($_POST['is_current']) ? 1 : 0
        ];

        if (empty($data['institution']) || empty($data['major']) || empty($data['start_date'])) {
            $data['id'] = $id;
            view('admin/educations/form', ['title' => 'Edit Education', 'error' => 'Institution, Major, and Start Date are required.', 'education' => $data]);
            return;
        }

        $eduModel = new Education();
        $eduModel->update($id, $data);
        redirect('/admin/educations');
    }

    public function educationDelete(): void {
        $id = (int)($_POST['id'] ?? 0);
        $eduModel = new Education();
        $eduModel->delete($id);
        redirect('/admin/educations');
    }

    // ==========================================
    // SKILLS CRUD
    // ==========================================
    public function skillsIndex(): void {
        $skillModel = new Skill();
        $skills = $skillModel->all();
        view('admin/skills/index', ['skills' => $skills]);
    }

    public function skillCreate(): void {
        view('admin/skills/form', ['title' => 'Add Skill']);
    }

    public function skillStore(): void {
        $data = [
            'name' => trim($_POST['name'] ?? ''),
            'level' => (int)($_POST['level'] ?? 0),
            'category' => trim($_POST['category'] ?? '')
        ];

        if (empty($data['name']) || empty($data['category'])) {
            view('admin/skills/form', ['title' => 'Add Skill', 'error' => 'Name and Category are required.', 'skill' => $data]);
            return;
        }

        $skillModel = new Skill();
        $skillModel->create($data);
        redirect('/admin/skills');
    }

    public function skillEdit(): void {
        $id = (int)($_GET['id'] ?? 0);
        $skillModel = new Skill();
        $skill = $skillModel->find($id);

        if (!$skill) {
            redirect('/admin/skills');
        }

        view('admin/skills/form', ['title' => 'Edit Skill', 'skill' => $skill]);
    }

    public function skillUpdate(): void {
        $id = (int)($_POST['id'] ?? 0);
        $data = [
            'name' => trim($_POST['name'] ?? ''),
            'level' => (int)($_POST['level'] ?? 0),
            'category' => trim($_POST['category'] ?? '')
        ];

        if (empty($data['name']) || empty($data['category'])) {
            $data['id'] = $id;
            view('admin/skills/form', ['title' => 'Edit Skill', 'error' => 'Name and Category are required.', 'skill' => $data]);
            return;
        }

        $skillModel = new Skill();
        $skillModel->update($id, $data);
        redirect('/admin/skills');
    }

    public function skillDelete(): void {
        $id = (int)($_POST['id'] ?? 0);
        $skillModel = new Skill();
        $skillModel->delete($id);
        redirect('/admin/skills');
    }

    // ==========================================
    // PROJECTS CRUD
    // ==========================================
    public function projectsIndex(): void {
        $projectModel = new Project();
        $projects = $projectModel->all();
        view('admin/projects/index', ['projects' => $projects]);
    }

    public function projectCreate(): void {
        view('admin/projects/form', ['title' => 'Add Project']);
    }

    public function projectStore(): void {
        $data = [
            'title' => trim($_POST['title'] ?? ''),
            'description' => trim($_POST['description'] ?? ''),
            'demo_url' => trim($_POST['demo_url'] ?? ''),
            'github_url' => trim($_POST['github_url'] ?? '')
        ];

        if (empty($data['title'])) {
            view('admin/projects/form', ['title' => 'Add Project', 'error' => 'Title is required.', 'project' => $data]);
            return;
        }

        // Handle Image Upload
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadedImg = uploadFile($_FILES['image'], 'public/uploads', ['jpg', 'jpeg', 'png', 'gif']);
            if ($uploadedImg) {
                $data['image'] = $uploadedImg;
            }
        }

        $projectModel = new Project();
        $projectModel->create($data);
        redirect('/admin/projects');
    }

    public function projectEdit(): void {
        $id = (int)($_GET['id'] ?? 0);
        $projectModel = new Project();
        $project = $projectModel->find($id);

        if (!$project) {
            redirect('/admin/projects');
        }

        view('admin/projects/form', ['title' => 'Edit Project', 'project' => $project]);
    }

    public function projectUpdate(): void {
        $id = (int)($_POST['id'] ?? 0);
        $projectModel = new Project();
        $project = $projectModel->find($id);

        $data = [
            'title' => trim($_POST['title'] ?? ''),
            'description' => trim($_POST['description'] ?? ''),
            'demo_url' => trim($_POST['demo_url'] ?? ''),
            'github_url' => trim($_POST['github_url'] ?? '')
        ];

        if (empty($data['title'])) {
            $data['id'] = $id;
            view('admin/projects/form', ['title' => 'Edit Project', 'error' => 'Title is required.', 'project' => $data]);
            return;
        }

        // Handle Image Upload
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadedImg = uploadFile($_FILES['image'], 'public/uploads', ['jpg', 'jpeg', 'png', 'gif']);
            if ($uploadedImg) {
                $data['image'] = $uploadedImg;
            }
        }

        $projectModel->update($id, $data);
        redirect('/admin/projects');
    }

    public function projectDelete(): void {
        $id = (int)($_POST['id'] ?? 0);
        $projectModel = new Project();
        $projectModel->delete($id);
        redirect('/admin/projects');
    }

    // ==========================================
    // CERTIFICATES CRUD
    // ==========================================
    public function certificatesIndex(): void {
        $certModel = new Certificate();
        $certificates = $certModel->all();
        view('admin/certificates/index', ['certificates' => $certificates]);
    }

    public function certificateCreate(): void {
        view('admin/certificates/form', ['title' => 'Add Certificate']);
    }

    public function certificateStore(): void {
        $data = [
            'name' => trim($_POST['name'] ?? ''),
            'issuing_organization' => trim($_POST['issuing_organization'] ?? ''),
            'issue_date' => trim($_POST['issue_date'] ?? ''),
            'credential_url' => trim($_POST['credential_url'] ?? ''),
            'credential_id' => trim($_POST['credential_id'] ?? '')
        ];

        if (empty($data['name']) || empty($data['issuing_organization']) || empty($data['issue_date'])) {
            view('admin/certificates/form', ['title' => 'Add Certificate', 'error' => 'Name, Issuing Organization, and Issue Date are required.', 'certificate' => $data]);
            return;
        }

        $certModel = new Certificate();
        $certModel->create($data);
        redirect('/admin/certificates');
    }

    public function certificateEdit(): void {
        $id = (int)($_GET['id'] ?? 0);
        $certModel = new Certificate();
        $certificate = $certModel->find($id);

        if (!$certificate) {
            redirect('/admin/certificates');
        }

        view('admin/certificates/form', ['title' => 'Edit Certificate', 'certificate' => $certificate]);
    }

    public function certificateUpdate(): void {
        $id = (int)($_POST['id'] ?? 0);
        $data = [
            'name' => trim($_POST['name'] ?? ''),
            'issuing_organization' => trim($_POST['issuing_organization'] ?? ''),
            'issue_date' => trim($_POST['issue_date'] ?? ''),
            'credential_url' => trim($_POST['credential_url'] ?? ''),
            'credential_id' => trim($_POST['credential_id'] ?? '')
        ];

        if (empty($data['name']) || empty($data['issuing_organization']) || empty($data['issue_date'])) {
            $data['id'] = $id;
            view('admin/certificates/form', ['title' => 'Edit Certificate', 'error' => 'Name, Issuing Organization, and Issue Date are required.', 'certificate' => $data]);
            return;
        }

        $certModel = new Certificate();
        $certModel->update($id, $data);
        redirect('/admin/certificates');
    }

    public function certificateDelete(): void {
        $id = (int)($_POST['id'] ?? 0);
        $certModel = new Certificate();
        $certModel->delete($id);
        redirect('/admin/certificates');
    }
}
