<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ======================================================
// FRONTEND
// ======================================================

// Home
$routes->get('/', 'HomeController::index');

// About
$routes->get('about', 'HomeController::about');

// Search
$routes->get('search', 'HomeController::search');

// Products
$routes->group('products', function ($routes) {
  $routes->get('/', 'ProductController::index');
  $routes->get('category/(:segment)', 'ProductController::category/$1');
  $routes->get('(:segment)', 'ProductController::show/$1');
});

// Services
$routes->group('services', function ($routes) {
  $routes->get('/', 'ServiceController::index');
  $routes->get('(:segment)', 'ServiceController::show/$1');
});

// Brands
$routes->group('brands', function ($routes) {
  $routes->get('/', 'BrandController::index');
  $routes->get('(:segment)', 'BrandController::show/$1');
});

// Principals
$routes->group('principals', function ($routes) {
  $routes->get('/', 'PrincipalController::index');
  $routes->get('(:segment)', 'PrincipalController::show/$1');
});

// Blog
$routes->group('blog', function ($routes) {
  $routes->get('/', 'BlogController::index');
  $routes->get('category/(:segment)', 'BlogController::category/$1');
  $routes->get('(:segment)', 'BlogController::show/$1');
});

// Contact
$routes->group('contact', function ($routes) {
  $routes->get('/', 'ContactController::index');
  $routes->post('send', 'ContactController::send');
});


// ======================================================
// ADMIN
// ======================================================

$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], function ($routes) {

  // Dashboard
  // $routes->get('/', 'DashboardController::index');

  // Categories
  $routes->group('categories', function ($routes) {
    $routes->get('/', 'CategoryController::index');
    $routes->get('create', 'CategoryController::create');
    $routes->post('store', 'CategoryController::store');
    $routes->get('edit/(:num)', 'CategoryController::edit/$1');
    $routes->post('update/(:num)', 'CategoryController::update/$1');
    $routes->get('delete/(:num)', 'CategoryController::delete/$1');
  });

  // Brands
  $routes->group('brands', function ($routes) {
    $routes->get('/', 'BrandController::index');
    $routes->get('create', 'BrandController::create');
    $routes->post('store', 'BrandController::store');
    $routes->get('edit/(:num)', 'BrandController::edit/$1');
    $routes->post('update/(:num)', 'BrandController::update/$1');
    $routes->get('delete/(:num)', 'BrandController::delete/$1');
  });

  // License Types
  $routes->group('license-types', function ($routes) {
    $routes->get('/', 'LicenseTypeController::index');
    $routes->get('create', 'LicenseTypeController::create');
    $routes->post('store', 'LicenseTypeController::store');
    $routes->get('edit/(:num)', 'LicenseTypeController::edit/$1');
    $routes->post('update/(:num)', 'LicenseTypeController::update/$1');
    $routes->get('delete/(:num)', 'LicenseTypeController::delete/$1');
  });

  // Principals
  $routes->group('principals', function ($routes) {
    $routes->get('/', 'PrincipalController::index');
    $routes->get('create', 'PrincipalController::create');
    $routes->post('store', 'PrincipalController::store');
    $routes->get('edit/(:num)', 'PrincipalController::edit/$1');
    $routes->post('update/(:num)', 'PrincipalController::update/$1');
    $routes->get('delete/(:num)', 'PrincipalController::delete/$1');
  });

  // Products
  $routes->group('products', function ($routes) {
    $routes->get('/', 'ProductController::index');
    $routes->get('create', 'ProductController::create');
    $routes->post('store', 'ProductController::store');
    $routes->get('edit/(:num)', 'ProductController::edit/$1');
    $routes->post('update/(:num)', 'ProductController::update/$1');
    $routes->get('delete/(:num)', 'ProductController::delete/$1');
  });

  // Product Images
  $routes->group('product-images', function ($routes) {
    $routes->get('/', 'ProductImageController::index');
    $routes->get('create', 'ProductImageController::create');
    $routes->post('store', 'ProductImageController::store');
    $routes->get('edit/(:num)', 'ProductImageController::edit/$1');
    $routes->post('update/(:num)', 'ProductImageController::update/$1');
    $routes->get('delete/(:num)', 'ProductImageController::delete/$1');
  });

  // Services
  $routes->group('services', function ($routes) {
    $routes->get('/', 'ServiceController::index');
    $routes->get('create', 'ServiceController::create');
    $routes->post('store', 'ServiceController::store');
    $routes->get('edit/(:num)', 'ServiceController::edit/$1');
    $routes->post('update/(:num)', 'ServiceController::update/$1');
    $routes->get('delete/(:num)', 'ServiceController::delete/$1');
  });

  // Testimonials
  $routes->group('testimonials', function ($routes) {
    $routes->get('/', 'TestimonialController::index');
    $routes->get('create', 'TestimonialController::create');
    $routes->post('store', 'TestimonialController::store');
    $routes->get('edit/(:num)', 'TestimonialController::edit/$1');
    $routes->post('update/(:num)', 'TestimonialController::update/$1');
    $routes->get('delete/(:num)', 'TestimonialController::delete/$1');
  });

  // FAQs
  $routes->group('faqs', function ($routes) {
    $routes->get('/', 'FaqController::index');
    $routes->get('create', 'FaqController::create');
    $routes->post('store', 'FaqController::store');
    $routes->get('edit/(:num)', 'FaqController::edit/$1');
    $routes->post('update/(:num)', 'FaqController::update/$1');
    $routes->get('delete/(:num)', 'FaqController::delete/$1');
  });

  // Blog Categories
  $routes->group('blog-categories', function ($routes) {
    $routes->get('/', 'BlogCategoryController::index');
    $routes->get('create', 'BlogCategoryController::create');
    $routes->post('store', 'BlogCategoryController::store');
    $routes->get('edit/(:num)', 'BlogCategoryController::edit/$1');
    $routes->post('update/(:num)', 'BlogCategoryController::update/$1');
    $routes->get('delete/(:num)', 'BlogCategoryController::delete/$1');
  });

  // Blogs
  $routes->group('blogs', function ($routes) {
    $routes->get('/', 'BlogController::index');
    $routes->get('create', 'BlogController::create');
    $routes->post('store', 'BlogController::store');
    $routes->get('edit/(:num)', 'BlogController::edit/$1');
    $routes->post('update/(:num)', 'BlogController::update/$1');
    $routes->get('delete/(:num)', 'BlogController::delete/$1');
  });

  // Settings
  $routes->group('settings', function ($routes) {
    $routes->get('/', 'SettingController::index');
    $routes->post('save', 'SettingController::save');
  });
});
