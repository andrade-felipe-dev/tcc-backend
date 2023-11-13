<?php

namespace App\UseCases\SocialNetwork;

use App\Models\SocialNetwork;

class CreateSocialNetwork
{
    public function execute(SocialNetworkDTO $data): bool
    {
        return app(SocialNetwork::class)->create($data->toArray());
    }
}
