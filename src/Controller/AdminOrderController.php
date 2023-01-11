<?php

namespace App\Controller;

use App\Config\Database;
use App\Core\View;
use App\Service\OrderService;

class AdminOrderController
{
    protected OrderService $service;

    public function __construct()
    {
        $connection = Database::getConnection();
        $this->service = new OrderService($connection);
    }


    public function get()
    {
        View::render("admin/orders", [
            "title" => "Admin - Products",
            "isHomepage" => true,
            "isEditor" => false,
            "orders" => $this->service->findAll()
        ]);
    }

    public function confirm(int $order_id) {
        $this->service->confirm($order_id);
        header("Location: /admin/orders");
        exit();
    }
}
