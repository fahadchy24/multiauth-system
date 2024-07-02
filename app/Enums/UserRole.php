<?php

namespace App\Enums;

enum UserRole
{
    case SUPERADMIN;
    case ADMIN;
    case USER;


    public function toLabel(): string
    {
        return match ($this) {
            self::SUPERADMIN => 'Super Admin',
            self::ADMIN => 'Admin',
            self::USER => 'User',
        };
    }

    public function toSlug(): string
    {
        return match ($this) {
            self::SUPERADMIN => 'super-admin',
            self::ADMIN => 'admin',
            self::USER => 'user',
        };
    }
}
