<?php

namespace App\UseCases\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUser
{
    public function execute(UserDTO $dto): void
    {
        app(User::class)->create([
            'email' => $dto->email,
            'name' => $dto->name,
            'password' => Hash::make($dto->password),
            'profile' => $dto->profile
        ]);
    }
}
