<?php

namespace Tests\Unit\SocialNetwork;

use App\Models\SocialNetwork;
use App\UseCases\SocialNetwork\SocialNetworkDTO;
use App\UseCases\SocialNetwork\UpdateSocialNetwork;
use Tests\TestCase;

class UpdateSocialNetworkTest extends TestCase
{
    public function test_should_be_update_social_network(): void
    {
        $socialNetwork = SocialNetwork::factory()->make();

        $socialNetworkMock = $this->createPartialMock(SocialNetwork::class, ['update']);
        $socialNetworkMock->expects($this->once())
            ->method('update')
            ->willReturn(true);


        $dto = SocialNetworkDTO::from($socialNetwork);

        (new UpdateSocialNetwork())->execute($socialNetworkMock, $dto);
    }
}
