<?php

namespace App\Controller;

use App\Config\Database;
use App\Core\View;
use App\Service\ProductService;
use App\Service\SessionService;

class SearchController
{
    protected ProductService $search;
    protected SessionService $session;

    public function __construct()
    {
        $connection = Database::getConnection();
        $this->search = new ProductService($connection);
        $this->session = new SessionService($connection);
    }

    public function get()
    {
        $decode = $this->session->getSession();
        $role = $decode ? $decode->role : null;

        View::render("blog/search", [
            "title" => "Search: ",
            "role" => $role,
            "products" => $this->search->findLike($_GET["q"])
        ]);
    }
}
