<?php

namespace App\Controller;

use App\Config\Database;
use App\Core\View;
use App\Model\ProductModel;
use App\Service\ProductService;
use App\Utils\UploadImage;
use App\Utils\ValidationException;

class AdminProductNewController
{
    private ProductService $service;

    public function __construct()
    {
        $connection = Database::getConnection();
        $this->service = new ProductService($connection);
    }

    public function get(): void
    {
        View::render("admin/editor", [
            "title" => "Admin - New Product",
            "isHomepage" => false,
            "isEditor" => true
        ]);
    }

    public function post(): void
    {
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
                "title" => "Luliba - New Product",
                "message" => $error->getMessage()
            ]);
        }
    }
}
