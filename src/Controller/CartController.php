<?php

namespace App\Controller;

use App\Config\Database;
use App\Core\View;
use App\Model\CartModel;
use App\Service\CartService;
use App\Service\SessionService;

class CartController
{
    protected CartService $carts;

    public function __construct()
    {
        $connection = Database::getConnection();
        $this->carts = new CartService($connection);
    }

    public function get()
    {
        $decode = SessionService::getSession();
        $role = $decode ? $decode->role : null;

        View::render("blog/carts", [
            "title" => "Luliba - Carts",
            "role" => $role,
            "carts" => $this->carts->findByUserId($decode->id)
        ]);
    }

    public function add(int $product_id)
    {
        $decode = SessionService::getSession();

        $model = new CartModel();
        $model->user_id = $decode->id;
        $model->product_id = $product_id;
        $this->carts->create($model);

        header("Location: /account/carts");
        exit();
    }

    public function delete(int $product_id)
    {
        $this->carts->destroy($product_id);
        header("Location: /account/carts");
        exit();
    }
}
