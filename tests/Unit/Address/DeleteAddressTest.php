<?php

namespace Tests\Unit\Address;

use App\Models\Address;
use App\UseCases\Address\DeleteAddress;
use PHPUnit\Framework\TestCase;

class DeleteAddressTest extends TestCase
{
    public function test_should_be_delete(): void
    {
        $addressMock = $this->getMockBuilder(Address::class)
            ->getMock();

        $addressMock->expects($this->once())
            ->method('delete')
            ->willReturn(true);

        $result = (new DeleteAddress())->execute($addressMock);

        $this->assertTrue($result);
    }
}
