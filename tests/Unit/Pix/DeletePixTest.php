<?php

namespace Tests\Unit\Pix;

use App\Models\Pix;
use App\UseCases\Pix\DeletePix;
use Tests\TestCase;

class DeletePixTest extends TestCase
{
    public function test_should_be_delete_pix(): void
    {
        $pixMock = $this->getMockBuilder(Pix::class)
            ->getMock();

        $pixMock->expects($this->once())
            ->method('delete')
            ->willReturn(true);

        $result = (new DeletePix())->execute($pixMock);

        $this->assertTrue($result);
    }
}
