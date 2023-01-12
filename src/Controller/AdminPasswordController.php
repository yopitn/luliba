<?php

namespace App\Controller;

use App\Config\Database;
use App\Core\View;
use App\Model\PasswordModel;
use App\Service\SessionService;
use App\Service\UserService;
use App\Utils\ValidationException;

class AdminPasswordController
{
    protected UserService $user;
    protected SessionService $session;

    public function __construct()
    {
        $connection = Database::getConnection();
        $this->user = new UserService($connection);
        $this->session = new SessionService($connection);
    }
    public function get()
    {
        View::render("admin/password", [
            "title" => "Admin - Change password",
            "isHomepage" => true,
            "isEditor" => false,
        ]);
    }

    public function post()
    {
        $decode = $this->session->getSession();
        $role = $decode ? $decode->role : null;

        try {
            $model = new PasswordModel();
            $model->user_id = $decode->id;
            $model->old_password = $_POST["old-password"];
            $model->new_password = $_POST["new-password"];

            $this->user->updatePassword($model);
            View::render("admin/password", [
                "title" => "Luliba - Change password",
                "isHomepage" => true,
                "isEditor" => false,
                "success" => true,
                "message" => "Password updated successfully"
            ]);
        } catch (ValidationException $error) {
            View::render("admin/password", [
                "title" => "Luliba - Change password",
                "isHomepage" => true,
                "isEditor" => false,
                "success" => false,
                "message" => $error->getMessage()
            ]);
        }
    }
}
