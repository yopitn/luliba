<?php

namespace App\Controller;

use App\Config\Database;
use App\Core\View;
use App\Model\PasswordModel;
use App\Service\SessionService;
use App\Service\SettingService;
use App\Service\UserService;
use App\Utils\ValidationException;

class AdminPasswordController
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
        $setting = $this->setting->findAll();

        View::render("admin/password", [
            "title" => "Admin - Change password",
            "isHomepage" => true,
            "isEditor" => false,
            "setting" => $setting
        ]);
    }

    public function post()
    {
        $decode = $this->session->getSession();
        $setting = $this->setting->findAll();

        try {
            $model = new PasswordModel();
            $model->user_id = $decode->id;
            $model->old_password = $_POST["old-password"];
            $model->new_password = $_POST["new-password"];

            $this->user->updatePassword($model);
            View::render("admin/password", [
                "title" => "Admin - Change password",
                "isHomepage" => true,
                "isEditor" => false,
                "success" => true,
                "message" => "Password updated successfully",
                "setting" => $setting
            ]);
        } catch (ValidationException $error) {
            View::render("admin/password", [
                "title" => "Admin - Change password",
                "isHomepage" => true,
                "isEditor" => false,
                "success" => false,
                "message" => $error->getMessage(),
                "setting" => $setting
            ]);
        }
    }
}
