<?php

namespace App\Service;

use App\Model\PasswordModel;
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

    public function findById(int $id): UserModel
    {
        try {
            $statement = $this->connection->prepare(<<<SQL
            SELECT 
                name, 
                email, 
                address,
                telephone
            FROM users
            WHERE id = ?
            SQL);

            $statement->execute([$id]);

            $row = $statement->fetch();

            $model = new UserModel();
            $model->name = $row["name"];
            $model->email = $row["email"];
            $model->address = $row["address"];
            $model->telephone = $row["telephone"];

            return $model;
        } catch (\Exception $error) {
            throw $error;
        }
    }

    public function update(UserModel $model)
    {
        try {
            $statement = $this->connection->prepare("SELECT id, email FROM users WHERE id != ?");
            $statement->execute([$model->id]);

            $results = $statement->fetchAll();

            foreach ($results as $row) {
                if ($row["email"] === $model->email) {
                    throw new ValidationException("Email already exists");
                }
            }

            $statement = $this->connection->prepare(<<<SQL
            UPDATE users SET 
                name = ?,
                email = ?,
                address = ?,
                telephone = ?
            WHERE id = ?
            SQL);

            $statement->execute([
                $model->name,
                $model->email,
                $model->address,
                $model->telephone,
                $model->id
            ]);
        } catch (\Exception $error) {
            throw $error;
        }
    }

    public function updatePassword(PasswordModel $model) {
        try {
            $statement = $this->connection->prepare("SELECT id, password FROM users WHERE id = ?");
            $statement->execute([
                $model->user_id
            ]);

            $row = $statement->fetch();

            $match = password_verify($model->old_password, $row["password"]);

            if (!$match) {
                throw new ValidationException("Old password is incorrect.");
            }

            $password = password_hash($model->new_password, PASSWORD_BCRYPT);

            $statement = $this->connection->prepare("UPDATE users SET password = ? WHERE id = ?");
            $statement->execute([$password, $model->user_id]);
        } catch (\Exception $error) {
            throw $error;
        }
    }
}
