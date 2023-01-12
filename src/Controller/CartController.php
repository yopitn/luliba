<?php

namespace App\Controller;

use App\Config\Database;
use App\Core\View;
use App\Model\CartModel;
use App\Service\CartService;
use App\Service\SessionService;

class CartController
{
    protected CartService $cart;
    protected SessionService $session;

    public function __construct()
    {
        $connection = Database::getConnection();
        $this->cart = new CartService($connection);
        $this->session = new SessionService($connection);
    }

    public function get()
    {
        $decode = $this->session->getSession();
        $role = $decode ? $decode->role : null;

        View::render("blog/carts", [
            "title" => "Luliba - Carts",
            "role" => $role,
            "carts" => $this->cart->findByUserId($decode->id)
        ]);
    }

    public function add(int $product_id)
    {
        $decode = $this->session->getSession();

        $model = new CartModel();
        $model->user_id = $decode->id;
        $model->product_id = $product_id;
        $this->cart->create($model);

        header("Location: /account/carts");
        exit();
    }

    public function delete(int $product_id)
    {
        $this->cart->destroy($product_id);
        header("Location: /account/carts");
        exit();
    }
}
