<?php

namespace Tests\Feature;

use App\Models\User;
use App\UseCases\Matching\ValidationParticipants;
use App\UseCases\User\ProfileUserENUM;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MatchingTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->authUser();
    }

    public function test_should_be_valid_voluntary(): void
    {
        $voluntary = User::factory()->create([
            'profile' => ProfileUserENUM::USER
        ]);

        $voluntary2 = User::factory()->create([
           'profile' => ProfileUserENUM::ENTITY
        ]);

        $this->assertTrue(ValidationParticipants::isVoluntary($voluntary->id));
        $this->assertFalse(ValidationParticipants::isVoluntary($voluntary2->id));
    }

    public function test_should_be_valid_entity(): void
    {
        $entity = User::factory()->create([
            'profile' => ProfileUserENUM::ENTITY
        ]);

        $entity2 = User::factory()->create([
            'profile' => ProfileUserENUM::USER
        ]);

        $this->assertTrue(ValidationParticipants::isEntity($entity->id));
        $this->assertFalse(ValidationParticipants::isEntity($entity2->id));
    }
}
