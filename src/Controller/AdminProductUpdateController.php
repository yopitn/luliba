<?php

namespace App\Controller;

use App\Config\Database;
use App\Core\View;
use App\Model\ProductModel;
use App\Service\ProductService;
use App\Service\SettingService;
use App\Utils\ValidationException;

class AdminProductUpdateController
{
    protected SettingService $setting;
    protected ProductService $service;

    public function __construct()
    {
        $connection = Database::getConnection();
        $this->setting = new SettingService($connection);
        $this->service = new ProductService($connection);
    }

    public function get(int $id)
    {
        $setting = $this->setting->findAll();

        View::render("admin/editor", [
            "title" => "Admin - Update Product",
            "isHomepage" => false,
            "isEditor" => true,
            "setting" => $setting,
            "product" => $this->service->findById($id)
        ]);
    }

    public function post(int $id) {
        $setting = $this->setting->findAll();

        try {
            $model = new ProductModel();
            $model->name = $_POST["name"];
            $model->description = $_POST["description"];
            $model->category = $_POST["category"];
            $model->price = $_POST["price"];
            $model->stock = $_POST["stock"];

            $this->service->update($model, $id);
            header("Location: /admin/products");
            exit();
        } catch (ValidationException $error) {
            View::render("admin/editor", [
                "title" => "Admin - Update Product",
                "message" => $error->getMessage(),
                "setting" => $setting,
            ]);
        }
    }
}
