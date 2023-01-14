<?php

namespace App\Controller;

use App\Config\Database;
use App\Core\View;
use App\Service\ProductService;
use App\Service\SessionService;
use App\Service\SettingService;

class ProductController
{
    protected SessionService $session;
    protected SettingService $setting;
    protected ProductService $product;

    public function __construct()
    {
        $connection = Database::getConnection();
        $this->session = new SessionService($connection);
        $this->setting = new SettingService($connection);
        $this->product = new ProductService($connection);
    }

    public function get($slug)
    {
        $product = $this->product->findBySlug($slug);
        $decode = $this->session->getSession();
        $role = $decode ? $decode->role : null;
        $setting = $this->setting->findAll();

        View::render("blog/product", [
            "title" => $product->name . " - $setting->sitename",
            "role" => $role,
            "product" => $product,
            "setting" => $setting
        ]);
    }
}
