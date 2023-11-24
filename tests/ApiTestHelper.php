<?php

namespace Tests;

use Illuminate\Support\Facades\Http;

class ApiTestHelper
{
    public static function authenticateAndGetToken(string $email, string $password)
    {
        $response = Http::post('/api/login', [
            'email' => $email,
            'password' => $password,
        ]);

        return $response->json('access_token');
    }

    public static function makeAuthenticatedRequest($method, $url, $token, $data = [])
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ])->$method($url, $data);

        return $response;
    }
}

