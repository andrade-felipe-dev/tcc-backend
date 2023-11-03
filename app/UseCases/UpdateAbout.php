<?php

namespace App\UseCases;

use App\Models\About;

class UpdateAbout
{
    public function execute(About $about, AboutDTO $data): About
    {
        $about->update([
            'description' => $data->description
        ]);

        return $about;
    }
}
