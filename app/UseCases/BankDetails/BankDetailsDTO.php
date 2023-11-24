<?php

namespace App\UseCases\BankDetails;

use Spatie\LaravelData\Attributes\Validation\IntegerType;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Data;
use Symfony\Contracts\Service\Attribute\Required;

class BankDetailsDTO extends Data
{
    public function __construct(
        #[Required, StringType, Min(3), Max(255)]
        public readonly string $name,
        #[Required, IntegerType]
        public readonly int $agency,
        #[Required, IntegerType]
        public readonly int $account
    )
    {}
}
