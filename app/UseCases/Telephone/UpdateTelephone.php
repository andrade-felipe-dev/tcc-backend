<?php

namespace App\UseCases\Telephone;

use App\Models\Telephone;

class UpdateTelephone
{
    public function execute(Telephone $telephone, TelephoneDTO $data): Telephone
    {
        $telephone->update($data->toArray());

        return $telephone;
    }
}
