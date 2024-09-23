<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Student;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// $routes->get('/student', 'Student::view');
$routes->get('/student','Home::create');


//For Post Data(Save Data)
$routes->post('/student/store', 'Home::store');


//For Fetch Data
$routes->get('/student/getdata','Home::getdata');
