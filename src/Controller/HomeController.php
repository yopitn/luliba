<?php

namespace App\Controller;

use App\Core\View;
use App\Service\SessionService;

class HomeController
{
    public function get()
    {
        $decode = SessionService::getSession();
        $role = $decode ? $decode->role : null;

        View::render("blog/home", [
            "title" => "Luliba",
            "role" => $role
        ]);
    }
}
