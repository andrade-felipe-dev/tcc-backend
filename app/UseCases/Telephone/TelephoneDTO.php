<?php

namespace App\UseCases\Telephone;

use Spatie\LaravelData\Attributes\Validation\IntegerType;
use Spatie\LaravelData\Data;
use Symfony\Contracts\Service\Attribute\Required;

class TelephoneDTO extends Data
{
    public function __construct(
        #[Required, IntegerType]
        public readonly int $ddd,
        #[Required, IntegerType]
        public readonly int $number
    )
    {
    }
}
