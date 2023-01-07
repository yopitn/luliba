<?php

namespace App\Config;

use PHPUnit\Framework\TestCase;

class DatabaseTest extends TestCase
{
    public function testConnection()
    {
        $connection = new Database();

        self::assertNotNull($connection->getConnection());
    }
}
