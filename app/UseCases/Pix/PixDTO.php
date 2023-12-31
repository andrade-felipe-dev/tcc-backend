<?php

namespace App\UseCases\Pix;

use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\IntegerType;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Data;
use Symfony\Contracts\Service\Attribute\Required;

class PixDTO extends Data
{
    public function __construct(
        #[Required, StringType, Min(3), Max(255)]
        public readonly string $type,
        #[Required, StringType, Min(3), Max(255)]
        public readonly string $value,
        #[Required, IntegerType, Exists('bank_details', 'id')]
        public readonly int $idBankDetails
    )
    {}
}
