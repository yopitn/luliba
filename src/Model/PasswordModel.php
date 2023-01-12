<?php

namespace App\Model;

class PasswordModel
{
    public ?string $user_id = null;
    public ?string $old_password = null;
    public ?string $new_password = null;
}
