<?php

namespace App\Controller;

use App\Config\Database;
use App\Core\View;
use App\Service\ProductService;
use App\Service\SessionService;
use App\Service\SettingService;

class SearchController
{
    protected SessionService $session;
    protected SettingService $setting;
    protected ProductService $search;

    public function __construct()
    {
        $connection = Database::getConnection();
        $this->search = new ProductService($connection);
        $this->setting = new SettingService($connection);
        $this->session = new SessionService($connection);
    }

    public function get()
    {
        $decode = $this->session->getSession();
        $role = $decode ? $decode->role : null;
        $setting = $this->setting->findAll();

        View::render("blog/search", [
            "title" => "Search: " . $_GET["q"],
            "role" => $role,
            "products" => $this->search->findLike($_GET["q"]),
            "setting" => $setting
        ]);
    }
}
