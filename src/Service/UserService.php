<?php

namespace App\Service;

use App\Model\UserModel;

class UserService
{
    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function create(UserModel $model): UserModel
    {
        try {
            $name = $model->name;
            $email = $model->email;
            $password = password_hash($model->password, PASSWORD_BCRYPT);

            $statement = $this->connection->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
            $statement->execute([
                $name,
                $email,
                $password
            ]);

            return $model;
        } catch (\Exception $error) {
            throw $error;
        }
    }
}
