<?php

namespace App\Controller;

use App\Config\Database;
use App\Core\View;
use App\Model\OrderModel;
use App\Service\OrderService;
use App\Service\SessionService;
use App\Service\SettingService;

class OrderController
{
    protected SessionService $session;
    protected SettingService $setting;
    protected OrderService $orders;

    public function __construct()
    {
        $connection = Database::getConnection();
        $this->orders = new OrderService($connection);
        $this->setting = new SettingService($connection);
        $this->session = new SessionService($connection);
    }

    public function get()
    {
        $decode = $this->session->getSession();
        $role = $decode ? $decode->role : null;
        $setting = $this->setting->findAll();

        View::render("blog/orders", [
            "title" => "$setting->sitename - Orders",
            "role" => $role,
            "orders" => $this->orders->findByUserId($decode->id),
            "setting" => $setting
        ]);
    }

    public function add(int $cart_id)
    {
        $decode = $this->session->getSession();

        $model = new OrderModel();
        $model->user_id = $decode->id;
        $model->cart_id = $cart_id;
        $model->status = false;
        $this->orders->create($model);

        header("Location: /account/orders");
        exit();
    }

    public function delete(int $order_id)
    {
        $this->orders->destroy($order_id);
        header("Location: /account/orders");
        exit();
    }
}
