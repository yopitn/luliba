<?php

namespace App\Controller;

use App\Config\Database;
use App\Core\View;
use App\Model\PasswordModel;
use App\Service\SessionService;
use App\Service\SettingService;
use App\Service\UserService;
use App\Utils\ValidationException;

class PasswordController
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

        View::render("blog/password", [
            "title" => "$setting->sitename - Change password",
            "role" => $role,
            "setting" => $setting
        ]);
    }

    public function post()
    {
        $decode = $this->session->getSession();
        $role = $decode ? $decode->role : null;
        $setting = $this->setting->findAll();

        try {
            $model = new PasswordModel();
            $model->user_id = $decode->id;
            $model->old_password = $_POST["old-password"];
            $model->new_password = $_POST["new-password"];

            $this->user->updatePassword($model);
            View::render("blog/password", [
                "title" => "$setting->sitename - Change password",
                "role" => $role,
                "success" => true,
                "message" => "Password updated successfully",
                "setting" => $setting
            ]);
        } catch (ValidationException $error) {
            View::render("blog/password", [
                "title" => "$setting->sitename - Change password",
                "role" => $role,
                "success" => false,
                "message" => $error->getMessage(),
                "setting" => $setting
            ]);
        }
    }
}
