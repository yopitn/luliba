<?php

namespace App\Controller;

use App\Config\Database;
use App\Model\UserModel;
use App\Service\SessionService;

class LogoutController
{
    protected SessionService $service;

    public function __construct()
    {
        $connection = Database::getConnection();
        $this->service = new SessionService($connection);
    }


    public function get(): void
    {
        $session = SessionService::getSession();
        $model = new UserModel;
        $model->id = $session->id;

        $this->service->destroy($model);

        header("Location: /");
        exit();
    }
}
