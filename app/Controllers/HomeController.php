<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Profile;
use App\Models\Experience;
use App\Models\Education;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Certificate;

class HomeController extends Controller {
    public function index(): void {
        $profileModel = new Profile();
        $experienceModel = new Experience();
        $educationModel = new Education();
        $skillModel = new Skill();
        $projectModel = new Project();
        $certificateModel = new Certificate();

        $profile = $profileModel->getFirst();
        $experiences = $experienceModel->allOrdered();
        $educations = $educationModel->allOrdered();
        $skillsGrouped = $skillModel->allGrouped();
        $projects = $projectModel->all();
        $certificates = $certificateModel->all();

        view('home', [
            'profile' => $profile,
            'experiences' => $experiences,
            'educations' => $educations,
            'skillsGrouped' => $skillsGrouped,
            'projects' => $projects,
            'certificates' => $certificates
        ]);
    }
}
