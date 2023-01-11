<?php

namespace App\Controller;

use App\Config\Database;
use App\Service\ProductService;

class AdminProductDeleteController
{
    protected ProductService $service;

    public function __construct()
    {
        $connection = Database::getConnection();
        $this->service = new ProductService($connection);
    }

    public function get(int $id)
    {
        $this->service->destroy($id);
        header("Location: /admin/products");
        exit();
    }
}
