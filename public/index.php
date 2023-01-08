<?php

require_once __DIR__ . "/../vendor/autoload.php";

use App\Controller\AdminController;
use App\Controller\AdminProductController;
use App\Controller\HomeController;
use App\Controller\LoginController;
use App\Controller\SignupController;
use App\Core\Routes;
use App\Middleware\LoginMiddleware;

Routes::get("/", null, HomeController::class . "::get");

Routes::get("/login", LoginMiddleware::class . "::isNotLogin", LoginController::class . "::get");
Routes::post("/login", LoginMiddleware::class . "::isNotLogin", LoginController::class . "::post");

Routes::get("/signup", LoginMiddleware::class . "::isNotLogin", SignupController::class . "::get");
Routes::post("/signup", LoginMiddleware::class . "::isNotLogin", SignupController::class . "::post");

Routes::get("/admin", null, AdminController::class . "::get");
Routes::get("/admin/products", null, AdminProductController::class . "::get");

Routes::run();
