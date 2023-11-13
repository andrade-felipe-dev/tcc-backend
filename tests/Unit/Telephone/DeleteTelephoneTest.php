<?php

namespace Tests\Unit\Telephone;

use App\Models\Telephone;
use App\UseCases\Telephone\DeleteTelephone;
use Tests\TestCase;

class DeleteTelephoneTest extends TestCase
{
    public function test_should_be_delete_telephone(): void
    {
        $telephoneMock = $this->getMockBuilder(Telephone::class)
            ->getMock();

        $telephoneMock->expects($this->once())
            ->method('delete')
            ->willReturn(true);

        $result = (new DeleteTelephone())->execute($telephoneMock);

        $this->assertTrue($result);
    }
}
