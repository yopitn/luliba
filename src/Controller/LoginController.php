<?php

namespace App\Controller;

use App\Config\Database;
use App\Core\View;
use App\Model\UserModel;
use App\Service\SessionService;
use App\Utils\ValidationException;

class LoginController
{
    protected SessionService $service;

    public function __construct()
    {
        $connection = Database::getConnection();
        $this->service = new SessionService($connection);
    }


    public function get(): void
    {
        View::render("blog/login", [
            "title" => "Luliba - Login"
        ]);
    }

    public function post(): void
    {
        $model = new UserModel();
        $model->email = $_POST["email"];
        $model->password = $_POST["password"];

        try {
            $user = $this->service->create($model);

            if ($user->role === "admin") {
                header("Location: /admin");
                exit();
            }

            if ($user->role === "customer") {
                header("Location: /");
                exit();
            }
        } catch (ValidationException $error) {
            View::render("blog/login", [
                "title" => "Luliba - Login",
                "message" => $error->getMessage()
            ]);
        }
    }
}
