<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('courses', 'CoursesPage::index');
$routes->get('courses/(:num)', 'CoursesPage::detail/$1');

$routes->get('register', 'Auth::register');
$routes->post('register', 'Auth::processRegister');
$routes->get('register-success', 'Auth::registerSuccess');

$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::processLogin');
$routes->get('logout', 'Auth::logout');


$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], function($routes) {
    $routes->get('/', 'AdminController::dashboard'); 
    $routes->get('guru-pending', 'AdminController::guruPending');
    $routes->get('guru-approve/(:num)', 'AdminController::approveGuru/$1');
    $routes->get('guru-reject/(:num)', 'AdminController::rejectGuru/$1');
    $routes->get('users', 'AdminController::users');
    $routes->get('user/status/(:num)/(:alpha)', 'AdminController::updateStatus/$1/$2');
});
$routes->group('admin', ['filter' => 'admin'], function($routes) {
    $routes->get('/', 'AdminController::dashboard');
    $routes->get('guru-pending', 'AdminController::guruPending');
    $routes->get('users', 'AdminController::users');
});



$routes->group('guru', ['filter' => 'guru'], function($routes) {
    $routes->get('/', 'GuruController::dashboard');
    $routes->get('pending', 'GuruController::pending');
});

$routes->get('guru/courses', 'GuruController::courses');
$routes->get('guru/courses/create', 'GuruController::createCourse');
$routes->get('guru/courses/edit', 'GuruController::EditCourse');
$routes->post('guru/courses/store', 'GuruController::storeCourse');
$routes->get('guru/courses/delete/(:num)', 'GuruController::deleteCourse/$1');


$routes->get('guru/create', 'GuruController::create');
$routes->post('guru/store', 'GuruController::storeMaterial');









