<?php

namespace App\UseCases\SocialNetwork;

use App\Models\SocialNetwork;

class DeleteSocialNetwork
{
    public function execute(SocialNetwork $socialNetwork): bool
    {
        return $socialNetwork->delete();
    }
}
