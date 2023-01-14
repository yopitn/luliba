<?php

namespace App\Controller;

use App\Config\Database;
use App\Core\View;
use App\Model\UserModel;
use App\Service\SettingService;
use App\Service\UserService;
use App\Utils\ValidationException;

class SignupController
{
    protected SettingService $setting;
    protected UserService $user;

    public function __construct()
    {
        $connection = Database::getConnection();
        $this->setting = new SettingService($connection);
        $this->user = new UserService($connection);
    }

    public function get(): void
    {
        $setting = $this->setting->findAll();

        View::render("blog/signup", [
            "title" => "$setting->sitename - Signup",
            "setting" => $setting
        ]);
    }

    public function post(): void
    {
        $setting = $this->setting->findAll();

        $model = new UserModel();
        $model->name = $_POST["name"];
        $model->email = $_POST["email"];
        $model->password = $_POST["password"];

        try {
            $this->user->create($model);
            header("Location: /login");
            exit();
        } catch (ValidationException $error) {
            View::render("blog/signup", [
                "title" => "Luliba - Signup",
                "message" => $error->getMessage(),
                "setting" => $setting
            ]);
        }
    }
}
