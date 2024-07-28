<?php

use Thanhnt84\Duan1\Controllers\Admin\DashboardController;
use Thanhnt84\Duan1\Controllers\Admin\CategoryController;
use Thanhnt84\Duan1\Controllers\Admin\ProductController;
use Thanhnt84\Duan1\Controllers\Admin\UserController;

// $router->before('GET|POST', '/admin/*.*', function () {

//     if (!is_logged()) {
//         header('location: ' . url('auth/login'));
//         exit();
//     }

//     if (!is_admin()) {
//         header('location: ' . url());
//         exit();
//     }
// });

$router->mount('/admin', function () use ($router) {

    $router->get('/', DashboardController::class . '@dashboard');

    // CRUD Category
    $router->mount('/categories', function () use ($router) {
        $router->get('/',               CategoryController::class . '@index');  // Danh sách
        $router->get('/create',         CategoryController::class . '@create'); // Show form thêm mới
        $router->post('/store',         CategoryController::class . '@store');  // Lưu mới vào DB
        $router->get('/{id}/edit',      CategoryController::class . '@edit');   // Show form sửa
        $router->post('/{id}/update',   CategoryController::class . '@update'); // Lưu sửa vào DB
        $router->get('/{id}/delete',    CategoryController::class . '@delete'); // Xóa
    });
    // CRUD PRODUCT
    $router->mount('/products', function () use ($router) {
        $router->get('/',               ProductController::class . '@index');  // Danh sách
        $router->get('/create',         ProductController::class . '@create'); // Show form thêm mới
        $router->post('/store',         ProductController::class . '@store');  // Lưu mới vào DB
        $router->get('/{id}/show',      ProductController::class . '@show');   // Xem chi tiết
        $router->get('/{id}/edit',      ProductController::class . '@edit');   // Show form sửa
        $router->post('/{id}/update',   ProductController::class . '@update'); // Lưu sửa vào DB
        $router->get('/{id}/delete',    ProductController::class . '@delete'); // Xóa
    });

    $router->mount('/users', function () use ($router) {
        $router->get('/',               UserController::class . '@index');  // Danh sách
        $router->get('/create',         UserController::class . '@create'); // Show form thêm mới
        $router->post('/store',         UserController::class . '@store');  // Lưu mới vào DB
        $router->get('/{id}/show',      UserController::class . '@show');   // Xem chi tiết
        $router->get('/{id}/edit',      UserController::class . '@edit');   // Show form sửa
        $router->post('/{id}/update',   UserController::class . '@update'); // Lưu sửa vào DB
        $router->get('/{id}/delete',    UserController::class . '@delete'); // Xóa
    });
   
});
