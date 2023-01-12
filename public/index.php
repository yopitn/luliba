<?php

require_once __DIR__ . "/../vendor/autoload.php";

use App\Controller\AccountController;
use App\Controller\AdminAccountController;
use App\Controller\AdminController;
use App\Controller\AdminOrderController;
use App\Controller\AdminPasswordController;
use App\Controller\AdminProductController;
use App\Controller\AdminProductDeleteController;
use App\Controller\AdminProductNewController;
use App\Controller\AdminProductUpdateController;
use App\Controller\CartController;
use App\Controller\HomeController;
use App\Controller\LoginController;
use App\Controller\LogoutController;
use App\Controller\OrderController;
use App\Controller\PasswordController;
use App\Controller\ProductController;
use App\Controller\ProductsController;
use App\Controller\SearchController;
use App\Controller\SignupController;
use App\Core\Routes;
use App\Middleware\LoginMiddleware;

Routes::get("/", null, HomeController::class . "::get");
Routes::get("/products", null, ProductsController::class . "::get");
Routes::get("/product/([0-9a-zA-Z-]*)", null, ProductController::class . "::get");
Routes::get("/search", null, SearchController::class . "::get");

Routes::get("/login", LoginMiddleware::class . "::isNotLogin", LoginController::class . "::get");
Routes::post("/login", LoginMiddleware::class . "::isNotLogin", LoginController::class . "::post");

Routes::get("/signup", LoginMiddleware::class . "::isNotLogin", SignupController::class . "::get");
Routes::post("/signup", LoginMiddleware::class . "::isNotLogin", SignupController::class . "::post");

Routes::get("/account", LoginMiddleware::class . "::isCustomer", AccountController::class . "::get");
Routes::post("/account", LoginMiddleware::class . "::isCustomer", AccountController::class . "::post");

Routes::get("/account/password", LoginMiddleware::class . "::isCustomer", PasswordController::class . "::get");
Routes::post("/account/password", LoginMiddleware::class . "::isCustomer", PasswordController::class . "::post");

Routes::get("/account/carts", LoginMiddleware::class . "::isCustomer", CartController::class . "::get");
Routes::get("/account/cart/add/([0-9a-zA-Z-]*)", LoginMiddleware::class . "::isCustomer", CartController::class . "::add");
Routes::get("/account/cart/delete/([0-9a-zA-Z-]*)", LoginMiddleware::class . "::isCustomer", CartController::class . "::delete");

Routes::get("/account/orders", LoginMiddleware::class . "::isCustomer", OrderController::class . "::get");
Routes::get("/account/order/add/([0-9a-zA-Z-]*)", LoginMiddleware::class . "::isCustomer", OrderController::class . "::add");
Routes::get("/account/order/delete/([0-9a-zA-Z-]*)", LoginMiddleware::class . "::isCustomer", OrderController::class . "::delete");

Routes::get("/account/logout", LoginMiddleware::class . "::isCustomer", LogoutController::class . "::get");

Routes::get("/admin", LoginMiddleware::class . "::isAdmin", AdminController::class . "::get");

Routes::get("/admin/products", LoginMiddleware::class . "::isAdmin", AdminProductController::class . "::get");
Routes::get("/admin/product/new", LoginMiddleware::class . "::isAdmin", AdminProductNewController::class . "::get");
Routes::post("/admin/product/new", LoginMiddleware::class . "::isAdmin", AdminProductNewController::class . "::post");
Routes::get("/admin/product/([0-9a-zA-Z-]*)", LoginMiddleware::class . "::isAdmin", AdminProductUpdateController::class . "::get");
Routes::post("/admin/product/([0-9a-zA-Z-]*)", LoginMiddleware::class . "::isAdmin", AdminProductUpdateController::class . "::post");
Routes::get("/admin/product/delete/([0-9a-zA-Z-]*)", LoginMiddleware::class . "::isAdmin", AdminProductDeleteController::class . "::get");

Routes::get("/admin/orders", LoginMiddleware::class . "::isAdmin", AdminOrderController::class . "::get");
Routes::get("/admin/order/confirm/([0-9a-zA-Z-]*)", LoginMiddleware::class . "::isAdmin", AdminOrderController::class . "::confirm");

Routes::get("/admin/account", LoginMiddleware::class . "::isAdmin", AdminAccountController::class . "::get");
Routes::post("/admin/account", LoginMiddleware::class . "::isAdmin", AdminAccountController::class . "::post");
Routes::get("/admin/account/password", LoginMiddleware::class . "::isAdmin", AdminPasswordController::class . "::get");
Routes::post("/admin/account/password", LoginMiddleware::class . "::isAdmin", AdminPasswordController::class . "::post");

Routes::get("/admin/logout", LoginMiddleware::class . "::isAdmin", LogoutController::class . "::get");

Routes::run();
