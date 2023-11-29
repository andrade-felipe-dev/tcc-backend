<?php

namespace App\UseCases\User;

use Spatie\LaravelData\Attributes\Validation\Email;
use Spatie\LaravelData\Attributes\Validation\Enum;
use Spatie\LaravelData\Attributes\Validation\InArray;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Data;
use Symfony\Contracts\Service\Attribute\Required;

class UserDTO extends Data
{
    public function __construct(
        #[Required, StringType, Email]
        public readonly string $email,
        #[Required, StringType, Min(3), Max(255)]
        public readonly string $name,
        #[Required, StringType, Min(6), Max(255)]
        public readonly string $password,
        #[Required, StringType, Enum(ProfileUserENUM::class)]
        public string $profile
    )
    {}
}
