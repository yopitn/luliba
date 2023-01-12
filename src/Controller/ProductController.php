<?php

namespace App\Controller;

use App\Config\Database;
use App\Core\View;
use App\Service\ProductService;
use App\Service\SessionService;

class ProductController
{
    protected ProductService $product;
    protected SessionService $session;

    public function __construct()
    {
        $connection = Database::getConnection();
        $this->product = new ProductService($connection);
        $this->session = new SessionService($connection);
    }

    public function get($slug)
    {
        $product = $this->product->findBySlug($slug);
        $decode = $this->session->getSession();
        $role = $decode ? $decode->role : null;

        View::render("blog/product", [
            "title" => $product->name . " - Luliba",
            "role" => $role,
            "product" => $product
        ]);
    }
}
