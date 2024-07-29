<?php


use Thanhnt84\Duan1\Controllers\Client\LoginController;
use Thanhnt84\Duan1\Controllers\Client\HomeController;
use Thanhnt84\Duan1\Controllers\Client\ContactController;
use Thanhnt84\Duan1\Controllers\Client\ProductController;
use Thanhnt84\Duan1\Controllers\Client\CartController;
use Thanhnt84\Duan1\Controllers\Client\OrderController;
$router->get( '/', HomeController::class . '@index');

$router->get('/contact',           ContactController::class    . '@index');
$router->post('/contact/store',    ContactController::class    . '@store');

$router->get('/products',          ProductController::class    . '@index');
$router->get('/products/{id}',     ProductController::class    . '@detail');

$router->get('/login',             LoginController::class    . '@showFormLogin');
$router->post('/handle-login',     LoginController::class    . '@login');
$router->get('/logout',            LoginController::class    . '@logout');

$router->get('cart/add',           CartController::class . '@add');
$router->get('cart/quantityInc',   CartController::class . '@quantityInc');
$router->get('cart/quantityDec',   CartController::class . '@quantityDec');
$router->get('cart/remove',        CartController::class . '@remove');
$router->get('cart/detail',        CartController::class . '@detail');

$router->post('order/checkout',     OrderController::class . '@checkout');