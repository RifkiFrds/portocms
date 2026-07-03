<?php

use App\Core\Router;

$router = new Router();

// Admin Routes (Directly mapped, no '/admin' prefix needed on URL routing pattern)
$router->get('/', 'AdminController@index');

// Profile Management
$router->get('/profile', 'AdminController@editProfile');
$router->post('/profile', 'AdminController@updateProfile');

// Experiences CRUD
$router->get('/experiences', 'AdminController@experiencesIndex');
$router->get('/experiences/create', 'AdminController@experienceCreate');
$router->post('/experiences/store', 'AdminController@experienceStore');
$router->get('/experiences/edit', 'AdminController@experienceEdit');
$router->post('/experiences/update', 'AdminController@experienceUpdate');
$router->post('/experiences/delete', 'AdminController@experienceDelete');

// Educations CRUD
$router->get('/educations', 'AdminController@educationsIndex');
$router->get('/educations/create', 'AdminController@educationCreate');
$router->post('/educations/store', 'AdminController@educationStore');
$router->get('/educations/edit', 'AdminController@educationEdit');
$router->post('/educations/update', 'AdminController@educationUpdate');
$router->post('/educations/delete', 'AdminController@educationDelete');

// Skills CRUD
$router->get('/skills', 'AdminController@skillsIndex');
$router->get('/skills/create', 'AdminController@skillCreate');
$router->post('/skills/store', 'AdminController@skillStore');
$router->get('/skills/edit', 'AdminController@skillEdit');
$router->post('/skills/update', 'AdminController@skillUpdate');
$router->post('/skills/delete', 'AdminController@skillDelete');

// Projects CRUD
$router->get('/projects', 'AdminController@projectsIndex');
$router->get('/projects/create', 'AdminController@projectCreate');
$router->post('/projects/store', 'AdminController@projectStore');
$router->get('/projects/edit', 'AdminController@projectEdit');
$router->post('/projects/update', 'AdminController@projectUpdate');
$router->post('/projects/delete', 'AdminController@projectDelete');

// Certificates CRUD
$router->get('/certificates', 'AdminController@certificatesIndex');
$router->get('/certificates/create', 'AdminController@certificateCreate');
$router->post('/certificates/store', 'AdminController@certificateStore');
$router->get('/certificates/edit', 'AdminController@certificateEdit');
$router->post('/certificates/update', 'AdminController@certificateUpdate');
$router->post('/certificates/delete', 'AdminController@certificateDelete');

// Logout
$router->get('/logout', 'AuthController@logout');

return $router;
