<?php

namespace App\Middleware;

use App\Service\SessionService;

class LoginMiddleware
{
    public static function isAdmin()
    {
        $login = SessionService::getSession();
        $role = $login->role;

        if ($role !== null && $role === "admin") {
            return true;
        }

        if ($login) {
            header("Location: /");
            exit();
        }

        header("Location: /login");
        exit();
    }

    public static function isCustomer()
    {
        $login = SessionService::getSession();
        $role = $login->role;

        if ($role !== null && $role === "customer") {
            return true;
        }

        if ($login) {
            header("Location: /");
            exit();
        }

        header("Location: /login");
        exit();
    }

    public static function isNotLogin()
    {
        $login = SessionService::getSessionBool();

        if ($login) {
            header("Location: /");
            exit();
        }

        return true;
    }
}
