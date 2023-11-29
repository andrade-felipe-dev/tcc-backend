<?php

namespace App\UseCases\Matching;

use App\UseCases\User\ProfileUserENUM;
use Spatie\LaravelData\Attributes\Validation\AcceptedIf;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\IntegerType;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;

class MatchingDTO extends Data
{
    public function __construct(
        #[Required, IntegerType, Exists('users', 'id'), AcceptedIf(ProfileUserENUM::USER)]
        private int $idVoluntary,

        #[Required, IntegerType, Exists('users', 'id'), AcceptedIf(ProfileUserENUM::ENTITY)]
        private int $idEntity,
    )
    {}
}
