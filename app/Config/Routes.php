<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('courses', 'CoursesPage::index');
$routes->get('courses/(:num)', 'CoursesPage::detail/$1');
$routes->group('api', ['filter' => 'cors'], function($routes) {
    $routes->get('courses', 'Api\Courses::index');
    $routes->get('courses/(:num)', 'Api\Courses::show/$1');
    $routes->get('courses/(:num)/materials', 'Api\Courses::materials/$1');
});


