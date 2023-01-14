<?php

namespace App\Controller;

use App\Config\Database;
use App\Core\View;
use App\Model\UserModel;
use App\Service\SessionService;
use App\Service\SettingService;
use App\Service\UserService;
use App\Utils\ValidationException;

class AccountController
{
    protected SessionService $session;
    protected SettingService $setting;
    protected UserService $user;

    public function __construct()
    {
        $connection = Database::getConnection();
        $this->session = new SessionService($connection);
        $this->setting = new SettingService($connection);
        $this->user = new UserService($connection);
    }

    public function get()
    {
        $decode = $this->session->getSession();
        $role = $decode ? $decode->role : null;
        $setting = $this->setting->findAll();
        $user = $this->user->findById($decode->id);

        View::render("blog/account", [
            "title" => "$setting->sitename - Account",
            "role" => $role,
            "user" => $user,
            "setting" => $setting
        ]);
    }

    public function post()
    {
        $decode = $this->session->getSession();
        $role = $decode ? $decode->role : null;
        $setting = $this->setting->findAll();

        try {
            $model = new UserModel();
            $model->id = $decode->id;
            $model->name = $_POST["name"];
            $model->email = $_POST["email"];
            $model->address = $_POST["address"];
            $model->telephone = $_POST["telephone"];

            $this->user->update($model);
            $user = $this->user->findById($decode->id);

            View::render("blog/account", [
                "title" => "$setting->sitename - Account",
                "role" => $role,
                "success" => true,
                "message" => "User data updated successfully",
                "setting" => $setting,
                "user" => $user,
            ]);
        } catch (ValidationException $error) {
            $user = $this->user->findById($decode->id);

            View::render("blog/account", [
                "title" => "$setting->sitename - Account",
                "role" => $role,
                "success" => false,
                "message" => $error->getMessage(),
                "setting" => $setting,
                "user" => $user
            ]);
        }
    }
}
