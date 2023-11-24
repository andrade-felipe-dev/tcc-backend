<?php

namespace Tests\Feature;

use App\Models\About;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\ApiTestHelper;
use Tests\TestCase;

class AboutTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = $this->authUser();
    }

    public function test_should_be_update_description(): void
    {
        About::factory()->create();
        $dataUpdate = [
            'description' => 'Value is updated'
        ];

        $response = $this->putJson('/api/about', $dataUpdate);

        $response->assertStatus(200);
        $this->assertDatabaseHas('about', $dataUpdate);
        $response->assertJson([
            'data' => $dataUpdate
        ]);
        $response->assertStatus(200);
    }

    public function test_should_be_pass_invalid_parameter_and_return_error(): void
    {
        About::factory()->create();
        $dataUpdate = [
            'description' => 'Va'
        ];

        $response = $this->putJson('/api/about', $dataUpdate);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['description']);
    }

    public function test_should_be_get_description(): void
    {
        $about = About::factory()->create();

        $response = $this->getJson('/api/about');
        $response->assertStatus(200);

        $response->assertJson([
            'data' => [
                'description' => $about->description
            ]
        ]);
    }
}
