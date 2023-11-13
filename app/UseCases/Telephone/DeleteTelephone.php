<?php

namespace App\UseCases\Telephone;

use App\Models\Telephone;

class DeleteTelephone
{
    public function execute(Telephone $telephone): bool
    {
        return $telephone->delete();
    }
}
