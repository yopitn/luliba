<?php

namespace App\Controller;

use App\Core\View;

class AdminProductUpdateController
{
    public function get()
    {
        View::render("admin/editor", [
            "title" => "Admin - Update Product",
            "isHomepage" => false,
            "isEditor" => true
        ]);
    }
}
