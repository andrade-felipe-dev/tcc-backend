<?php

namespace App\UseCases\SocialNetwork;

use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Attributes\Validation\Url;
use Spatie\LaravelData\Data;
use Symfony\Contracts\Service\Attribute\Required;

class SocialNetworkDTO extends Data
{
    public function __construct(
        #[Required, StringType, Min(3), Max(255)]
        public readonly string $name,
        #[Required, StringType, Min(3), Max(255), Url]
        public readonly string $url
    )
    {
    }
}
