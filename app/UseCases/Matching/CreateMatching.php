<?php

namespace App\UseCases\Matching;

use App\Models\Matching;

class CreateMatching
{
    public function execute(MatchingDTO $data): void
    {
        app(Matching::class)->create($data->toArray());
    }
}
