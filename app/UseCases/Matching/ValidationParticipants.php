<?php

namespace App\UseCases\Matching;

use App\Models\User;
use App\UseCases\User\FindById;
use App\UseCases\User\ProfileUserENUM;

class ValidationParticipants
{
    public static function isVoluntary(int $id): bool
    {
        $user = (new FindById())->execute($id);

        return ProfileUserENUM::USER === $user->profile;
    }

    public static function isEntity(int $id): bool
    {
        $user = (new FindById())->execute($id);

        return ProfileUserENUM::ENTITY === $user->profile;
    }
}
