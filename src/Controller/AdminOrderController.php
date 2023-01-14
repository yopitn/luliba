<?php

namespace App\Controller;

use App\Config\Database;
use App\Core\View;
use App\Service\OrderService;
use App\Service\SettingService;

class AdminOrderController
{
    protected SettingService $setting;
    protected OrderService $order;

    public function __construct()
    {
        $connection = Database::getConnection();
        $this->setting = new SettingService($connection);
        $this->order = new OrderService($connection);
    }


    public function get()
    {
        $setting = $this->setting->findAll();

        View::render("admin/orders", [
            "title" => "Admin - Products",
            "isHomepage" => true,
            "isEditor" => false,
            "setting" => $setting,
            "orders" => $this->order->findAll()
        ]);
    }

    public function confirm(int $order_id)
    {
        $this->order->confirm($order_id);
        header("Location: /admin/orders");
        exit();
    }
}
