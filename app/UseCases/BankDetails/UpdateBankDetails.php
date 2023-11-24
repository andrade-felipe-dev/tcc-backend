<?php

namespace App\UseCases\BankDetails;

use App\Models\BankDetails;
use App\UseCases\Pix\CreatePix;
use App\UseCases\Pix\DeletePix;
class UpdateBankDetails
{
    public function execute(BankDetails $bankData, BankDetailsDTO $dto): BankDetails
    {
        $bankData->update($dto->toArray());

        return $bankData;
    }
}
