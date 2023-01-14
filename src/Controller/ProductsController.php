<?php

namespace App\Controller;

use App\Config\Database;
use App\Core\View;
use App\Service\ProductService;
use App\Service\SessionService;
use App\Service\SettingService;

class ProductsController
{
    protected SessionService $session;
    protected SettingService $setting;
    protected ProductService $products;

    public function __construct()
    {
        $connection = Database::getConnection();
        $this->session = new SessionService($connection);
        $this->setting = new SettingService($connection);
        $this->products = new ProductService($connection);
    }

    public function get()
    {
        $decode = $this->session->getSession();
        $role = $decode ? $decode->role : null;
        $setting = $this->setting->findAll();

        View::render("blog/products", [
            "title" => "$setting->sitename - Products",
            "role" => $role,
            "products" => $this->products->findAll(),
            "setting" => $setting
        ]);
    }
}
