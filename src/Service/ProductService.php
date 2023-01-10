<?php

namespace App\Service;

use App\Model\ProductModel;
use App\Utils\Slugify;
use App\Utils\UploadImages;

class ProductService
{
    protected \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function create(ProductModel $model)
    {
        try {
            $slug = Slugify::generate($model->name, $this->connection, "products");

            $name = $model->name;
            $description = $model->description;
            $category = $model->category;
            $image = $model->image;
            $slug = $slug;
            $price = $model->price;
            $stock = $model->stock;
            $created_at = date("y-m-d H:i:s");
            $published_at = date("y-m-d H:i:s");

            $statement = $this->connection->prepare(<<<SQL
            INSERT INTO products (
                name, 
                description, 
                category,
                image, 
                slug, 
                price, 
                stock, 
                created_at, 
                published_at
                ) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
            SQL);
            $statement->execute([
                $name,
                $description,
                $category,
                $image,
                $slug,
                $price,
                $stock,
                $created_at,
                $published_at
            ]);
        } catch (\Exception $error) {
            throw $error;
        }
    }

    public function findAll(): array
    {
        try {
            $statement = $this->connection->prepare(<<<SQL
                SELECT
                    id, 
                    name, 
                    description, 
                    category,
                    image, 
                    slug, 
                    price, 
                    stock, 
                    updated_at, 
                    published_at
                FROM products
            SQL);

            $statement->execute();
            $results = $statement->fetchAll();

            $prodcuts = [];

            foreach ($results as $row) {
                $model = new ProductModel();
                $model->id = $row["id"];
                $model->name = $row["name"];
                $model->description = $row["description"];
                $model->category = $row["category"];
                $model->image = $row["image"];
                $model->slug = $row["slug"];
                $model->price = $row["price"];
                $model->stock = $row["stock"];
                $model->updated_at = $row["updated_at"];
                $model->published_at = $row["published_at"];

                $prodcuts[] = $model;
            }

            return $prodcuts;
        } catch (\Exception $error) {
            throw $error;
        }
    }
}
