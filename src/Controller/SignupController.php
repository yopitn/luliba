<?php

namespace App\Controller;

use App\Config\Database;
use App\Core\View;
use App\Model\UserModel;
use App\Service\UserService;
use App\Utils\ValidationException;

class SignupController
{
    private UserService $service;

    public function __construct()
    {
        $connection = Database::getConnection();
        $this->service = new UserService($connection);
    }

    public function get(): void
    {
        View::render("blog/signup", [
            "title" => "Luliba - Signup"
        ]);
    }

    public function post()
    {
        $model = new UserModel();
        $model->name = $_POST["name"];
        $model->email = $_POST["email"];
        $model->password = $_POST["password"];

        try {
            $this->service->create($model);
            header("Location: /login");
            exit();
        } catch (ValidationException $error) {
            View::render("blog/signup", [
                "title" => "Luliba - Signup",
                "message" => $error->getMessage()
            ]);
        }
    }
}
