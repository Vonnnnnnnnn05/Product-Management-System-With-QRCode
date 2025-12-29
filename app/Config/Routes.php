<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::loginView');
$routes->post('/login', 'AuthController::login');
$routes->get('/logout', 'AuthController::logout');

$routes->get('/products/cards', 'ProductController::cards');
$routes->get('/dashboard', 'ProductController::index');
$routes->get('product/productForm', 'ProductController::add');
$routes->post('products/store', 'ProductController::create');
$routes->get('products/edit/(:num)', 'ProductController::editForm/$1');
$routes->post('products/update/(:num)', 'ProductController::update/$1');
$routes->get('products/delete/(:num)', 'ProductController::delete/$1');
