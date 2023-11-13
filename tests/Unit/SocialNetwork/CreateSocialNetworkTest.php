<?php

namespace Tests\Unit\SocialNetwork;

use App\Models\SocialNetwork;
use App\UseCases\SocialNetwork\CreateSocialNetwork;
use App\UseCases\SocialNetwork\SocialNetworkDTO;
use Tests\TestCase;

class CreateSocialNetworkTest extends TestCase
{
    public function test_should_be_create_social_network(): void
    {
        $value = SocialNetwork::factory()->make();

        $dto = SocialNetworkDTO::from($value->toArray());

        $this->mock(SocialNetwork::class)
            ->expects('create')
            ->once()
            ->andReturnTrue();

        $response = (new CreateSocialNetwork())->execute($dto);

        $this->assertTrue($response);
    }
}
