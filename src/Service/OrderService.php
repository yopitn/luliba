<?php

namespace App\Service;

use App\Model\OrderModel;
use App\Model\OrderProductModel;
use App\Model\OrderProductUserModel;

class OrderService
{
    protected \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function create(OrderModel $model)
    {
        try {
            $statement = $this->connection->prepare("SELECT product_id FROM carts WHERE id = ?");
            $statement->execute([$model->cart_id]);

            $row = $statement->fetch();

            $user_id = $model->user_id;
            $product_id = $row["product_id"];
            $created_at = date("y-m-d H:i:s");

            $statement = $this->connection->prepare("INSERT INTO orders (user_id, product_id, created_at) VALUES (?, ?, ?)");
            $statement->execute([
                $user_id,
                $product_id,
                $created_at
            ]);

            $statement = $this->connection->prepare("DELETE FROM carts WHERE id = ?");
            $statement->execute([$model->cart_id]);
        } catch (\Exception $error) {
            throw $error;
        }
    }

    public function findAll()
    {
        try {
            $statement = $this->connection->prepare(<<<SQL
                SELECT 
                    orders.id, 
                    users.name,
                    orders.status,
                    products.price,
                    orders.created_at
                FROM orders
                INNER JOIN products
                ON orders.product_id = products.id
                INNER JOIN users
                ON orders.user_id = users.id
                ORDER BY created_at DESC
            SQL);
            $statement->execute();

            $results = $statement->fetchAll();

            $products = [];

            foreach ($results as $row) {
                $model = new OrderProductUserModel();
                $model->id = $row["id"];
                $model->customer = $row["name"];
                $model->status = $row["status"];
                $model->price = $row["price"];

                $products[] = $model;
            }

            return $products;
        } catch (\Exception $error) {
            throw $error;
        }
    }

    public function findByUserId(int $id)
    {
        try {
            $statement = $this->connection->prepare(<<<SQL
                SELECT 
                    orders.id, 
                    products.name, 
                    products.image, 
                    products.price,
                    orders.status
                FROM orders
                INNER JOIN products
                ON orders.product_id = products.id
                WHERE orders.user_id = ?;
            SQL);
            $statement->execute([$id]);

            $results = $statement->fetchAll();

            $products = [];

            foreach ($results as $row) {
                $model = new OrderProductModel();
                $model->id = $row["id"];
                $model->name = $row["name"];
                $model->image = $row["image"];
                $model->price = $row["price"];
                $model->status = $row["status"];

                $products[] = $model;
            }

            return $products;
        } catch (\Exception $error) {
            throw $error;
        }
    }

    public function confirm(int $id)
    {
        try {
            $statement = $this->connection->prepare("UPDATE orders SET status = ? WHERE id = ?");
            $statement->execute([true, $id]);
        } catch (\Exception $error) {
            throw $error;
        }
    }

    public function destroy(int $order_id)
    {
        try {
            $statement = $this->connection->prepare("DELETE FROM orders WHERE id = ?");
            $statement->execute([$order_id]);
        } catch (\Exception $error) {
            throw $error;
        }
    }
}
