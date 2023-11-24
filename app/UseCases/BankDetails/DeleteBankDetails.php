<?php

namespace App\UseCases\BankDetails;

use App\Models\BankDetails;
use App\UseCases\Pix\DeletePix;

class DeleteBankDetails
{
    public function execute(BankDetails $bankData): bool
    {
        return $bankData->delete();
    }
}
