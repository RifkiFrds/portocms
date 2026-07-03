<?php

// Web Routes
$router->get('/', 'HomeController@index');

$router->get('/login', 'AuthController@loginForm');
$router->post('/login', 'AuthController@login');
$router->get('/logout', 'AuthController@logout');

$router->get('/admin', 'AdminController@index');

// Profile Management
$router->get('/admin/profile', 'AdminController@editProfile');
$router->post('/admin/profile', 'AdminController@updateProfile');

// Experiences CRUD
$router->get('/admin/experiences', 'AdminController@experiencesIndex');
$router->get('/admin/experiences/create', 'AdminController@experienceCreate');
$router->post('/admin/experiences/store', 'AdminController@experienceStore');
$router->get('/admin/experiences/edit', 'AdminController@experienceEdit');
$router->post('/admin/experiences/update', 'AdminController@experienceUpdate');
$router->post('/admin/experiences/delete', 'AdminController@experienceDelete');

// Educations CRUD
$router->get('/admin/educations', 'AdminController@educationsIndex');
$router->get('/admin/educations/create', 'AdminController@educationCreate');
$router->post('/admin/educations/store', 'AdminController@educationStore');
$router->get('/admin/educations/edit', 'AdminController@educationEdit');
$router->post('/admin/educations/update', 'AdminController@educationUpdate');
$router->post('/admin/educations/delete', 'AdminController@educationDelete');

// Skills CRUD
$router->get('/admin/skills', 'AdminController@skillsIndex');
$router->get('/admin/skills/create', 'AdminController@skillCreate');
$router->post('/admin/skills/store', 'AdminController@skillStore');
$router->get('/admin/skills/edit', 'AdminController@skillEdit');
$router->post('/admin/skills/update', 'AdminController@skillUpdate');
$router->post('/admin/skills/delete', 'AdminController@skillDelete');

// Projects CRUD
$router->get('/admin/projects', 'AdminController@projectsIndex');
$router->get('/admin/projects/create', 'AdminController@projectCreate');
$router->post('/admin/projects/store', 'AdminController@projectStore');
$router->get('/admin/projects/edit', 'AdminController@projectEdit');
$router->post('/admin/projects/update', 'AdminController@projectUpdate');
$router->post('/admin/projects/delete', 'AdminController@projectDelete');

// Certificates CRUD
$router->get('/admin/certificates', 'AdminController@certificatesIndex');
$router->get('/admin/certificates/create', 'AdminController@certificateCreate');
$router->post('/admin/certificates/store', 'AdminController@certificateStore');
$router->get('/admin/certificates/edit', 'AdminController@certificateEdit');
$router->post('/admin/certificates/update', 'AdminController@certificateUpdate');
$router->post('/admin/certificates/delete', 'AdminController@certificateDelete');
