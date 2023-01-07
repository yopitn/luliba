<?php

namespace App\Config;

class Database
{
    private static ?\PDO $pdo = null;

    public static function getConnection(string $env = "development"): \PDO
    {
        if (self::$pdo === null) {
            require_once __DIR__ . "/../../configs/database.php";

            $config = getDatabaseConfig();

            self::$pdo = new \PDO(
                $config["database"][$env]["url"],
                $config["database"][$env]["username"],
                $config["database"][$env]["password"]
            );
        }

        return self::$pdo;
    }
}
