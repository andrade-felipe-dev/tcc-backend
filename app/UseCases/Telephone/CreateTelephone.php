<?php

namespace App\UseCases\Telephone;

use App\Models\Telephone;

class CreateTelephone
{
    public function execute(TelephoneDTO $data): bool
    {
        return app(Telephone::class)->create($data->toArray());
    }
}
