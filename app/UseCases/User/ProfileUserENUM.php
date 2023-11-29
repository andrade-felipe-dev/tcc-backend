<?php

namespace App\UseCases\User;

enum ProfileUserENUM: string
{
    const ADMIN = "ADMIN";
    const USER = "USER";
    const ENTITY = "ENTITY";

    public static function toArray(): array
    {
            return [
                self::ADMIN,
                self::USER,
                self::ENTITY
            ];
    }
}
