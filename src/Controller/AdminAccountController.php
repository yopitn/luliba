<?php

namespace App\Controller;

use App\Config\Database;
use App\Core\View;
use App\Model\UserModel;
use App\Service\SessionService;
use App\Service\UserService;
use App\Utils\ValidationException;

class AdminAccountController
{
    protected SessionService $session;
    protected UserService $user;

    public function __construct()
    {
        $connection = Database::getConnection();
        $this->user = new UserService($connection);
        $this->session = new SessionService($connection);
    }


    public function get()
    {
        $decode = $this->session->getSession();
        $user = $this->user->findById($decode->id);

        View::render("admin/account", [
            "title" => "Admin - Account",
            "isHomepage" => true,
            "isEditor" => false,
            "user" => $user
        ]);
    }

    public function post()
    {
        $decode = $this->session->getSession();
        $role = $decode ? $decode->role : null;

        try {
            $model = new UserModel();
            $model->id = $decode->id;
            $model->name = $_POST["name"];
            $model->email = $_POST["email"];

            $this->user->update($model);
            $user = $this->user->findById($decode->id);

            View::render("admin/account", [
                "title" => "Luliba - Account",
                "isHomepage" => true,
                "isEditor" => false,
                "success" => true,
                "message" => "User data updated successfully",
                "user" => $user
            ]);
        } catch (ValidationException $error) {
            $user = $this->user->findById($decode->id);

            View::render("admin/account", [
                "title" => "Luliba - Account",
                "isHomepage" => true,
                "isEditor" => false,
                "success" => false,
                "message" => $error->getMessage(),
                "user" => $user
            ]);
        }
    }
}
