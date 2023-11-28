<?php

namespace App\UseCases\User;

enum ProfileUser: string
{
    CASE ADMIN = "ADMIN";
    case USER = "USER";
    CASE ENTITY = "ENTITY";

    public static function toArray(): array
    {
            return [
                self::ADMIN,
                self::USER,
                self::ENTITY
            ];
    }
}
