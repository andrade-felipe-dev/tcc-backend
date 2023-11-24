<?php

namespace App\UseCases\Address;

use App\Models\Address;

class CreateAddress
{
    public  function execute(AddressDTO $data): bool
    {
        $value = [
            ...$data->toArray(),
            'postal_code' => $data->postalCode
        ];
        unset($value['postalCode']);

        return app(Address::class)->create($value);
    }
}
