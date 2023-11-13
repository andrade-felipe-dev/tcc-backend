<?php

namespace App\UseCases\SocialNetwork;

use App\Models\SocialNetwork;

class UpdateSocialNetwork
{
    public function execute(SocialNetwork $socialNetwork, SocialNetworkDTO $data): SocialNetwork
    {
        $socialNetwork->update($data->toArray());

        return $socialNetwork;
    }
}
