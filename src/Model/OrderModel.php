<?php

namespace App\Model;

class OrderModel
{
    public ?int $id = null;
    public ?int $user_id = null;
    public ?int $product_id = null;
    public ?int $cart_id = null;
    public ?bool $status = null;
    public ?string $created_at = null;
}
