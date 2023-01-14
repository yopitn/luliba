<?php

namespace App\Controller;

use App\Config\Database;
use App\Core\View;
use App\Model\CartModel;
use App\Service\CartService;
use App\Service\SessionService;
use App\Service\SettingService;

class CartController
{
    protected SessionService $session;
    protected SettingService $setting;
    protected CartService $cart;

    public function __construct()
    {
        $connection = Database::getConnection();
        $this->session = new SessionService($connection);
        $this->setting = new SettingService($connection);
        $this->cart = new CartService($connection);
    }

    public function get()
    {
        $decode = $this->session->getSession();
        $role = $decode ? $decode->role : null;
        $setting = $this->setting->findAll();

        View::render("blog/carts", [
            "title" => "$setting->sitename - Carts",
            "role" => $role,
            "carts" => $this->cart->findByUserId($decode->id),
            "setting" => $setting
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
