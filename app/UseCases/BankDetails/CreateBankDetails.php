<?php

namespace App\UseCases\BankDetails;

use App\Models\BankDetails;

class CreateBankDetails
{
    public function execute(BankDetailsDTO $bankDataDTO): bool
    {
        $data = $bankDataDTO->toArray();

        return !!app(BankDetails::class)->create($data);
    }
}
