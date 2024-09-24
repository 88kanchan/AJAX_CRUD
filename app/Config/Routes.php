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


//For Fetch Data (Get Data)(Retrive Data)
$routes->get('/student/getdata','Home::getdata');

//For View Data According to ID
$routes->post('/student/veiwStudent','Home::veiwStudent');

$routes->post('/student/edit','Home::edit');

$routes->post('/student/update','Home::update');

$routes->post('/student/delete','Home::delete');
