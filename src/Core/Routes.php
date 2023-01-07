<?php

namespace App\Core;

class Routes
{
    private static array $routes = [];

    private static function addRoute(string $method, string $path, $middleware, $handler): void
    {
        self::$routes[$method . $path] = [
            "method" => $method,
            "path" => $path,
            "middleware" => $middleware,
            "handler" => $handler,
        ];
    }

    public static function get(string $path, $middleware = null, $handler): void
    {
        self::addRoute("GET", $path, $middleware, $handler);
    }

    public static function post(string $path, $middleware = null, $handler): void
    {
        self::addRoute("POST", $path, $middleware, $handler);
    }

    public static function put(string $path, $middleware = null, $handler): void
    {
        self::addRoute("PUT", $path, $middleware, $handler);
    }

    public static function delete(string $path, $middleware = null, $handler): void
    {
        self::addRoute("DELETE", $path, $middleware, $handler);
    }

    public static function handler($handler): array
    {
        $parts = explode("::", $handler);

        if (is_array($parts)) {
            $className = array_shift($parts);
            $handler = new $className;

            $function = array_shift($parts);
            return [$handler, $function];
        }
    }

    public static function middleware($middleware): void
    {
        $parts = explode("::", $middleware);

        if (is_array($parts)) {
            $className = array_shift($parts);
            $middleware = new $className;

            $function = array_shift($parts);
            call_user_func_array([$middleware, $function], []);
        }
    }

    public static function run(): void
    {
        $path = "/";
        $method = $_SERVER["REQUEST_METHOD"];

        if (isset($_SERVER["REQUEST_URI"])) {
            $uri = parse_url($_SERVER["REQUEST_URI"]);
            $path = $uri["path"];
        }

        foreach (self::$routes as $route) {
            if ($route["path"] === $path && $route["method"] === $method) {
                $middleware = $route["middleware"];
                $handler = $route["handler"];
                $callback = self::handler($handler);

                if (!$middleware) {
                    call_user_func_array($callback, []);

                    return;
                }

                $next = self::middleware($middleware);

                if (!$next) {
                    call_user_func_array($callback, []);

                    return;
                }
            }
        }

        http_response_code(404);
    }
}
