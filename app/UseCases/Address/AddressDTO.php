<?php

namespace App\UseCases\Address;

use Spatie\LaravelData\Attributes\Validation\IntegerType;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Data;

class AddressDTO extends Data
{
    public function __construct(
        #[Required, StringType, Min(3)]
        public readonly string $street,
        #[Required, StringType, Min(3)]
        public readonly string $city,
        #[Required, IntegerType]
        public  readonly  int $number,
        #[Required, StringType, Min(2)]
        public readonly string $neighborhood,
        #[Required, StringType, Min(2), Max(2)]
        public readonly string $state,
        #[Required, StringType, Min(9), Max(9)]
        public readonly string $postalCode
    )
    {}
}

