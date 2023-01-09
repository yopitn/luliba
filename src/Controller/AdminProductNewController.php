<?php

namespace App\Controller;

use App\Core\View;

class AdminProductNewController
{
    public function get()
    {
        View::render("admin/editor", [
            "title" => "Admin - New Product",
            "isHomepage" => false,
            "isEditor" => true
        ]);
    }
}
