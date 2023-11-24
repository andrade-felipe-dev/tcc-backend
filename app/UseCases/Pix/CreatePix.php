<?php

namespace App\UseCases\Pix;

use App\Models\Pix;

class CreatePix
{
    public  function execute(PixDTO $data): bool
    {
        $data = [
            'type' => $data->type,
            'value' => $data->value,
            'id_bank_details' => $data->idBankDetails
        ];

        return !!app(Pix::class)->create($data);
    }
}
