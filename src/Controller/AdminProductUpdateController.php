<?php

namespace App\Controller;

use App\Config\Database;
use App\Core\View;
use App\Model\ProductModel;
use App\Service\ProductService;
use App\Utils\ValidationException;

class AdminProductUpdateController
{
    protected ProductService $service;

    public function __construct()
    {
        $connection = Database::getConnection();
        $this->service = new ProductService($connection);
    }

    public function get(int $id)
    {
        View::render("admin/editor", [
            "title" => "Admin - Update Product",
            "isHomepage" => false,
            "isEditor" => true,
            "product" => $this->service->findById($id)
        ]);
    }

    public function post(int $id) {
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
                "title" => "Luliba - Update Product",
                "message" => $error->getMessage()
            ]);
        }
    }
}
