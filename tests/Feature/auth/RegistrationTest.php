<?php

namespace Tests\Feature\auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_register()
    {

        $this->postJson(route('register'),[
            'name' => "teste",
            'email' => 'teste@teste.com',
            'password' => '123456',
            'password_confirmation' => '123456',
        ])->assertCreated();

        $this->assertDatabaseHas('users',['name' => 'teste']);
    }
}
