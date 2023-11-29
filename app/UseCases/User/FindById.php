<?php

namespace App\UseCases\User;

use App\Models\User;

class FindById
{
    public function execute(int $id): User
    {
        return app(User::class)->where('id', $id)->first();
    }
}
