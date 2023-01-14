<?php

namespace App\Controller;

use App\Config\Database;
use App\Core\View;
use App\Model\ProductModel;
use App\Service\ProductService;
use App\Service\SettingService;
use App\Utils\UploadImage;
use App\Utils\ValidationException;

class AdminProductNewController
{
    protected SettingService $setting;
    private ProductService $service;

    public function __construct()
    {
        $connection = Database::getConnection();
        $this->setting = new SettingService($connection);
        $this->service = new ProductService($connection);
    }

    public function get(): void
    {
        $setting = $this->setting->findAll();

        View::render("admin/editor", [
            "title" => "Admin - New Product",
            "isHomepage" => false,
            "isEditor" => true,
            "setting" => $setting,
        ]);
    }

    public function post(): void
    {
        $setting = $this->setting->findAll();

        try {
            $image = UploadImage::upload($_FILES["image"]);

            $model = new ProductModel();
            $model->name = $_POST["name"];
            $model->description = $_POST["description"];
            $model->category = $_POST["category"];
            $model->image = $image;
            $model->price = $_POST["price"];
            $model->stock = $_POST["stock"];

            $this->service->create($model);
            header("Location: /admin/products");
            exit();
        } catch (ValidationException $error) {
            View::render("admin/editor", [
                "title" => "Admin - New Product",
                "message" => $error->getMessage(),
                "setting" => $setting,
            ]);
        }
    }
}
