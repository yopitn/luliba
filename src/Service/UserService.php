<?php

namespace App\Service;

use App\Model\UserModel;
use App\Utils\ValidationException;

class UserService
{
    protected \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function create(UserModel $model)
    {
        try {
            $name = $model->name;
            $email = $model->email;
            $password = password_hash($model->password, PASSWORD_BCRYPT);

            $statement = $this->connection->prepare("SELECT name, email FROM users");
            $statement->execute();

            $results = $statement->fetchAll();

            foreach ($results as $row) {
                if ($row["email"] === $email) {
                    throw new ValidationException("Email already exists");
                }
            }

            $statement = $this->connection->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
            $statement->execute([
                $name,
                $email,
                $password
            ]);
        } catch (\Exception $error) {
            throw $error;
        }
    }
}
