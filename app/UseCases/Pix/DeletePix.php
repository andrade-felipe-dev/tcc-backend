<?php

namespace App\UseCases\Pix;

use App\Models\Pix;

class DeletePix
{
    public function execute(Pix $pix): bool
    {
        return $pix->delete();
    }
}
