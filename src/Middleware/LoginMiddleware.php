<?php

namespace App\Middleware;

use App\Service\SessionService;

class LoginMiddleware
{
    public function isAdmin()
    {
    }

    public function isCustomer()
    {
    }

    public static function isNotLogin()
    {
        $login = SessionService::getSessionBool();

        if ($login) {
            header("Location: /");
        }

        return true;
    }
}
