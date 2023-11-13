<?php

namespace App\UseCases\Pix;

use App\Models\Pix;

class CreatePix
{
    public  function execute(PixDTO $data): bool
    {
        return app(Pix::class)->create($data->toArray());
    }
}
