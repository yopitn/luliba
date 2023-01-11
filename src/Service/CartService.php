<?php

namespace App\Service;

use App\Model\CartModel;
use App\Model\ProductModel;

class CartService
{
    protected \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }


    public function create(CartModel $model)
    {
        try {
            $user_id = $model->user_id;
            $product_id = $model->product_id;
            $created_at = date("y-m-d H:i:s");

            $statement = $this->connection->prepare("INSERT INTO carts (user_id, product_id, created_at) VALUES (?, ?, ?)");
            $statement->execute([
                $user_id,
                $product_id,
                $created_at
            ]);
        } catch (\Exception $error) {
            throw $error;
        }
    }

    public function findByUserId(int $id): array
    {
        try {
            $statement = $this->connection->prepare(<<<SQL
                SELECT 
                    products.id, 
                    products.name, 
                    products.image, 
                    products.price
                FROM carts
                INNER JOIN products
                ON carts.product_id = products.id
                WHERE carts.user_id = ?;
            SQL);
            $statement->execute([$id]);

            $results = $statement->fetchAll();

            $products = [];

            foreach ($results as $row) {
                $model = new ProductModel();
                $model->id = $row["id"];
                $model->name = $row["name"];
                $model->image = $row["image"];
                $model->price = $row["price"];

                $products[] = $model;
            }

            return $products;
        } catch (\Exception $error) {
            throw $error;
        }
    }

    public function destroy(int $id) {
        try {
            $statement = $this->connection->prepare("DELETE FROM carts WHERE product_id = ?");
            $statement->execute([$id]);
        } catch (\Exception $error) {
            throw $error;
        }
    }
}
