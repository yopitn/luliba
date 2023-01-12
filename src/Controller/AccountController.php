<?php

namespace App\Controller;

use App\Config\Database;
use App\Core\View;
use App\Model\UserModel;
use App\Service\SessionService;
use App\Service\UserService;
use App\Utils\ValidationException;

class AccountController
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
        $decode = $this->session->getSession();
        $role = $decode ? $decode->role : null;
        $user = $this->user->findById($decode->id);

        View::render("blog/account", [
            "title" => "Luliba - Account",
            "role" => $role,
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
            $model->address = $_POST["address"];
            $model->telephone = $_POST["telephone"];

            $this->user->update($model);
            $user = $this->user->findById($decode->id);

            View::render("blog/account", [
                "title" => "Luliba - Account",
                "role" => $role,
                "success" => true,
                "message" => "User data updated successfully",
                "user" => $user
            ]);
        } catch (ValidationException $error) {
            $user = $this->user->findById($decode->id);

            View::render("blog/account", [
                "title" => "Luliba - Account",
                "role" => $role,
                "success" => false,
                "message" => $error->getMessage(),
                "user" => $user
            ]);
        }
    }
}
