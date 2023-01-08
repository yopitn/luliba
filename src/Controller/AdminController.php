<?php

namespace App\Controller;

class AdminController
{
    public function get()
    {
        header("Location: /admin/products");
    }
}
