<?php

namespace App\UseCases\Matching;

use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\IntegerType;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;

class MatchingDTO extends Data
{
    public function __construct(
        #[Required, IntegerType, Exists('users', 'id')]
        private int $idVoluntary,

        #[Required, IntegerType, Exists('users', 'id')]
        private int $idEntity,
    )
    {}
}
