<?php

namespace Tests\Feature\auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    public function test_a_user_can_login_with_email_and_password()
    {
        $user = $this->createUser();

        $response = $this->postJson(route('login'),[
            'email' => $user->email,
            'password' => 'password'
        ])->assertOk();

        $this->assertArrayHasKey('access_token',$response->json());
    }

    public function test_if_user_email_is_not_available_then_it_return_error()
    {
        $this->postJson(route('login'),[
            'email' => 'teste@teste.com',
            'password' => 'password'
        ])
            ->assertUnauthorized();
    }

    public function test_it_raise_error_if_password_is_incorrect()
    {
        $user = $this->createUser();

        $this->postJson(route('login'),[
            'email' => $user->email,
            'password' => 'random'
        ])
            ->assertUnauthorized();
    }
}
