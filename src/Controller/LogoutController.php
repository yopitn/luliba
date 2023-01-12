<?php

namespace App\Controller;

use App\Config\Database;
use App\Model\UserModel;
use App\Service\SessionService;

class LogoutController
{
    protected SessionService $session;

    public function __construct()
    {
        $connection = Database::getConnection();
        $this->session = new SessionService($connection);
    }

    public function get(): void
    {
        $session = $this->session->getSession();
        $model = new UserModel;
        $model->id = $session->id;

        $this->session->destroy($model);

        header("Location: /");
        exit();
    }
}
