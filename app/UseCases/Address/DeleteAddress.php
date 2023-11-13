<?php

namespace App\UseCases\Address;

use App\Models\Address;

class DeleteAddress
{
    public function execute(Address $address): bool
    {
        return $address->delete();
    }
}
