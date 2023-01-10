<?php

namespace App\Controller;

use App\Config\Database;
use App\Core\View;
use App\Service\ProductService;

class AdminProductController
{
    protected ProductService $service;

    public function __construct()
    {
        $connection = Database::getConnection();
        $this->service = new ProductService($connection);
    }

    public function get()
    {
        View::render("admin/products", [
            "title" => "Admin - Products",
            "isHomepage" => true,
            "isEditor" => false,
            "products" => $this->service->findAll()
        ]);
    }
}
