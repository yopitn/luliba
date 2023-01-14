<?php

namespace App\Controller;

use App\Config\Database;
use App\Core\View;
use App\Model\UserModel;
use App\Service\SessionService;
use App\Service\SettingService;
use App\Utils\ValidationException;

class LoginController
{
    protected SessionService $session;
    protected SettingService $setting;

    public function __construct()
    {
        $connection = Database::getConnection();
        $this->session = new SessionService($connection);
        $this->setting = new SettingService($connection);
    }

    public function get(): void
    {
        $setting = $this->setting->findAll();

        View::render("blog/login", [
            "title" => "$setting->sitename - Login"
        ]);
    }

    public function post(): void
    {
        $model = new UserModel();
        $model->email = $_POST["email"];
        $model->password = $_POST["password"];

        $setting = $this->setting->findAll();

        try {
            $user = $this->session->create($model);

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
                "title" => "$setting->sitename - Login",
                "message" => $error->getMessage()
            ]);
        }
    }
}
