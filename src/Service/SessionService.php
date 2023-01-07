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
            $email = $model->email;
            $password = $model->password;

            $statement = $this->connection->prepare("SELECT id, name, email, password, role FROM users WHERE email = ?");
            $statement->execute([$email]);

            $row = $statement->fetch();

            if (!$row) {
                throw new ValidationException("Email or Password is incorrect.");
            }

            $match = password_verify($password, $row["password"]);

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

            $model = new UserModel();
            $model->id = $row["id"];
            $model->name = $row["name"];
            $model->role = $row["role"];

            return $model;
        } catch (\Exception $error) {
            throw $error;
        }
    }

    public static function getSession()
    {
        if (isset($_COOKIE["luliba-session"])) {
            $jwt = $_COOKIE["luliba-session"];

            $decode = JWT::decode($jwt, new Key(self::SECRET_KEY, "HS256"));
            
            return $decode;
        }
    }

    public static function getSessionBool(): bool
    {
        if (isset($_COOKIE["luliba-session"])) {
            $jwt = $_COOKIE["luliba-session"];

            try {
                $decode = JWT::decode($jwt, new Key(self::SECRET_KEY, "HS256"));

                if ($decode) {
                    return true;
                }
            } catch (\Exception $error) {
                return false;
            }
        }

        return false;
    }
}
