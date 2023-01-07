<?php

function getDatabaseConfig(): array
{
    return [
        "database" => [
            "production" => [
                "url" => "mysql:host=localhost:3306;dbname=luliba",
                "username" => "root",
                "password" => "",
            ],
            "development" => [
                "url" => "mysql:host=localhost:3306;dbname=luliba",
                "username" => "root",
                "password" => "",
            ],
        ]
    ];
}
