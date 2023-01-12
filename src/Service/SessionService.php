<?php

namespace App\Service;

use App\Model\UserModel;
use App\Utils\ValidationException;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class SessionService
{
    private const SECRET_KEY = "b0d54cdd3ebaa2d4ad2590da177b5f0da298b6e48d19ce823047d16df85ee2b0158de1b4";
    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function create(UserModel $model): UserModel
    {
        try {
            $statement = $this->connection->prepare("SELECT id, name, email, password, role FROM users WHERE email = ?");
            $statement->execute([
                $model->email
            ]);

            $row = $statement->fetch();

            if (!$row) {
                throw new ValidationException("Email or Password is incorrect.");
            }

            $match = password_verify($model->password, $row["password"]);

            if (!$match) {
                throw new ValidationException("Email or Password is incorrect.");
            }

            $payload = [
                "id" => $row["id"],
                "name" => $row["name"],
                "role" => $row["role"]
            ];

            $jwt = JWT::encode($payload, self::SECRET_KEY, "HS256");

            $options = [
                "expires" => time() + 86400,
                "httponly" => true,
            ];

            setcookie("luliba-session", $jwt, $options);

            $statement = $this->connection->prepare("SELECT user_id, session FROM session WHERE user_id = ?");
            $statement->execute([$row["id"]]);

            if ($statement->fetch()) {
                $statement = $this->connection->prepare("UPDATE session SET session = ? WHERE user_id = ?");
                $statement->execute([$jwt, $row["id"]]);
            } else {
                $statement = $this->connection->prepare("INSERT INTO session (user_id, session) VALUES (?, ?)");
                $statement->execute([$row["id"], $jwt]);
            }

            $model->role = $row["role"];

            return $model;
        } catch (\Exception $error) {
            throw $error;
        }
    }

    public function destroy(UserModel $model): void
    {
        try {
            $session = $this->connection->prepare("DELETE FROM session WHERE user_id = ?");
            $session->execute([$model->id]);

            setcookie("luliba-session", '', 1, "/");
        } catch (\Exception $error) {
            throw $error;
        }
    }

    public function getSession()
    {
        if (isset($_COOKIE["luliba-session"])) {
            $statement = $this->connection->prepare("SELECT session FROM session WHERE session = ?");
            $statement->execute([$_COOKIE["luliba-session"]]);

            if ($row = $statement->fetch()) {
                $jwt = $row["session"];

                $decode = JWT::decode($jwt, new Key(self::SECRET_KEY, "HS256"));

                return $decode;
            }

            return null;
        }

        return null;
    }
}
