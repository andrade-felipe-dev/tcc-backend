<?php

namespace App\UseCases\Address;

use App\Models\Address;

class UpdateAddress
{
    public function execute(Address $address, AddressDTO $data): Address
    {
        $data = [
            ...$data->toArray(),
            'postal_code' => $data->postalCode
        ];
        unset($data['postalCode']);

        $address->update($data);

        return $address;
    }
}
