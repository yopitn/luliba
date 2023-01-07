<?php

namespace App\Core;

class View
{
    public static function render(string $view, array $model): void
    {
        require_once __DIR__ . "/../../templates/" . $view . ".php";
    }
}
