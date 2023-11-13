<?php

namespace App\UseCases\Pix;

use App\Models\Pix;

class UpdatePix
{
    public function execute(Pix $pix, PixDTO $data): Pix
    {
        $pix->update($data->toArray());

        return $pix;
    }
}
