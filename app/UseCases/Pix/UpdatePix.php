<?php

namespace App\UseCases\Pix;

use App\Models\Pix;

class UpdatePix
{
    public function execute(Pix $pix, PixDTO $pixDTO): Pix
    {
        $pix->update($pixDTO->toArray());

        return $pix;
    }
}
