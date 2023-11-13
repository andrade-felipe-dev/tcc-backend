<?php

namespace Tests\Unit\Pix;

use App\Models\Pix;
use App\UseCases\Pix\PixDTO;
use App\UseCases\Pix\UpdatePix;
use Tests\TestCase;

class UpdatePixTest extends TestCase
{
    public function test_should_be_update_pix(): void
    {
        $pix = Pix::factory()->make();

        $pixMock = $this->createPartialMock(Pix::class, ['update']);
        $pixMock->expects($this->once())
            ->method('update')
            ->willReturn(true);


        $dto = PixDTO::from($pix);

        (new UpdatePix())->execute($pixMock, $dto);
    }
}
