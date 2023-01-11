<?php

namespace App\Controller;

use App\Config\Database;
use App\Core\View;
use App\Model\OrderModel;
use App\Service\OrderService;
use App\Service\SessionService;

class OrderController
{
    protected OrderService $orders;

    public function __construct()
    {
        $connection = Database::getConnection();
        $this->orders = new OrderService($connection);
    }

    public function get()
    {
        $decode = SessionService::getSession();
        $role = $decode ? $decode->role : null;

        View::render("blog/orders", [
            "title" => "Luliba - Orders",
            "role" => $role,
            "orders" => $this->orders->findByUserId($decode->id)
        ]);
    }

    public function add(int $cart_id)
    {
        $decode = SessionService::getSession();

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
