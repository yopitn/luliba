<?php

namespace App\Controller;

use App\Config\Database;
use App\Core\View;
use App\Service\ProductService;
use App\Service\SettingService;

class AdminProductController
{
    protected SettingService $setting;
    protected ProductService $product;

    public function __construct()
    {
        $connection = Database::getConnection();
        $this->setting = new SettingService($connection);
        $this->product = new ProductService($connection);
    }

    public function get()
    {
        $setting = $this->setting->findAll();

        View::render("admin/products", [
            "title" => "Admin - Products",
            "isHomepage" => true,
            "isEditor" => false,
            "setting" => $setting,
            "products" => $this->product->findAll()
        ]);
    }
}
