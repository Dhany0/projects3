<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Halaman-halaman statis
$routes->get('/', 'Home::index');
$routes->get('/about', 'Page::about');
$routes->get('/faqs', 'Page::faqs');

// Rute untuk halaman kontak
$routes->get('/contact', 'Page::contact');
$routes->post('/contact', 'Contact::submit');

// Grup rute untuk area admin
$routes->group('admin', function($routes) {
    $routes->resource('produk', ['controller' => 'ProdukAdmin']);
});