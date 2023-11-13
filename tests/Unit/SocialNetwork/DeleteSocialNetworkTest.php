<?php

namespace Tests\Unit\SocialNetwork;

use App\Models\SocialNetwork;
use App\UseCases\SocialNetwork\DeleteSocialNetwork;
use Tests\TestCase;

class DeleteSocialNetworkTest extends TestCase
{
    public function test_should_be_delete_social_network(): void
    {
        $socialNetworkMock = $this->getMockBuilder(SocialNetwork::class)
            ->getMock();

        $socialNetworkMock->expects($this->once())
            ->method('delete')
            ->willReturn(true);

        $result = (new DeleteSocialNetwork())->execute($socialNetworkMock);

        $this->assertTrue($result);
    }
}
