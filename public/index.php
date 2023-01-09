<?php

require_once __DIR__ . "/../vendor/autoload.php";

use App\Controller\AdminController;
use App\Controller\AdminProductController;
use App\Controller\AdminProductNewController;
use App\Controller\AdminProductUpdateController;
use App\Controller\HomeController;
use App\Controller\LoginController;
use App\Controller\LogoutController;
use App\Controller\SignupController;
use App\Core\Routes;
use App\Middleware\LoginMiddleware;

Routes::get("/", null, HomeController::class . "::get");

Routes::get("/login", LoginMiddleware::class . "::isNotLogin", LoginController::class . "::get");
Routes::post("/login", LoginMiddleware::class . "::isNotLogin", LoginController::class . "::post");

Routes::get("/signup", LoginMiddleware::class . "::isNotLogin", SignupController::class . "::get");
Routes::post("/signup", LoginMiddleware::class . "::isNotLogin", SignupController::class . "::post");

Routes::get("/admin", LoginMiddleware::class . "::isAdmin", AdminController::class . "::get");
Routes::get("/admin/products", LoginMiddleware::class . "::isAdmin", AdminProductController::class . "::get");
Routes::get("/admin/product/new", LoginMiddleware::class . "::isAdmin", AdminProductNewController::class . "::get");
Routes::get("/admin/product/id", LoginMiddleware::class . "::isAdmin", AdminProductUpdateController::class . "::get");

Routes::get("/logout", LoginMiddleware::class . "::isCustomer", LogoutController::class . "::get");
Routes::get("/admin/logout", LoginMiddleware::class . "::isAdmin", LogoutController::class . "::get");

Routes::run();
