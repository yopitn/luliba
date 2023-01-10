<?php

namespace App\Controller;

use App\Config\Database;
use App\Core\View;
use App\Service\ProductService;
use App\Service\SessionService;

class ProductController
{
    protected ProductService $product;

    public function __construct()
    {
        $connection = Database::getConnection();
        $this->product = new ProductService($connection);
    }

    public function get($slug)
    {
        $product = $this->product->findBySlug($slug);
        $decode = SessionService::getSession();
        $role = $decode ? $decode->role : null;

        View::render("blog/product", [
            "title" => $product->name . " - Luliba",
            "role" => $role,
            "product" => $product
        ]);
    }
}
