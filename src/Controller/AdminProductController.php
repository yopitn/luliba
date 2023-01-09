<?php

namespace App\Controller;

use App\Core\View;

class AdminProductController
{
    public function get()
    {
        View::render("admin/products", [
            "title" => "Admin - Products",
            "isHomepage" => true,
            "isEditor" => false
        ]);
    }
}
