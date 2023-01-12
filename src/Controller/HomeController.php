<?php

namespace App\Controller;

use App\Config\Database;
use App\Core\View;
use App\Service\ProductService;
use App\Service\SessionService;

class HomeController
{
    protected ProductService $products;
    protected SessionService $session;

    public function __construct()
    {
        $connection = Database::getConnection();
        $this->products = new ProductService($connection);
        $this->session = new SessionService($connection);
    }

    public function get()
    {
        $decode = $this->session->getSession();
        $role = $decode ? $decode->role : null;

        View::render("blog/home", [
            "title" => "Luliba",
            "role" => $role,
            "products" => $this->products->findAll()
        ]);
    }
}
