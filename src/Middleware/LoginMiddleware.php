<?php

namespace App\Middleware;

use App\Config\Database;
use App\Service\SessionService;

class LoginMiddleware
{
    protected SessionService $session;

    public function __construct()
    {
        $connection = Database::getConnection();
        $this->session = new SessionService($connection);
    }


    public function isAdmin()
    {
        $login = $this->session->getSession();
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

    public function isCustomer()
    {
        $login = $this->session->getSession();
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

    public function isNotLogin()
    {
        $login = $this->session->getSession();

        if ($login) {
            header("Location: /");
            exit();
        }

        return true;
    }
}
