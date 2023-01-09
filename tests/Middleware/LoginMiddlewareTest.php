<?php

namespace App\Middleware;

use PHPUnit\Framework\TestCase;

class LoginMiddlewareTest extends TestCase
{
    public function testIsCostumer()
    {
        $middleware = new LoginMiddleware();
        $role = $middleware::isAdmin();

        self::assertEquals("admin", $role);
    }
}
