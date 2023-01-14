<?php

namespace App\Service;

use App\Model\SettingModel;

class SettingService
{
    protected \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function update($value, $name)
    {
        try {
            $statement = $this->connection->prepare("UPDATE setting SET value = ? WHERE name = ?");
            $statement->execute([$value, $name]);
        } catch (\Exception $error) {
            throw $error;
        }
    }

    public function findAll(): SettingModel
    {
        try {
            $statement = $this->connection->prepare("SELECT value FROM setting WHERE name = ?");
            $statement->execute(["sitename"]);
            $sitename = $statement->fetch();

            $statement = $this->connection->prepare("SELECT value FROM setting WHERE name = ?");
            $statement->execute(["description"]);
            $description = $statement->fetch();

            $statement = $this->connection->prepare("SELECT value FROM setting WHERE name = ?");
            $statement->execute(["currency"]);
            $currency = $statement->fetch();

            $setting = new SettingModel();
            $setting->sitename = $sitename["value"];
            $setting->description = $description["value"];
            $setting->currency = $currency["value"];

            return $setting;
        } catch (\Exception $error) {
            throw $error;
        }
    }
}
