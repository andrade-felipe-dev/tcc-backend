<?php

namespace Tests\Unit\Pix;

use App\Models\Pix;
use App\UseCases\Pix\CreatePix;
use App\UseCases\Pix\PixDTO;
use Tests\TestCase;

class CreatePixTest extends TestCase
{
    public function test_should_be_create_pix(): void
    {
        $value = Pix::factory()->make();

        $dto = PixDTO::from($value->toArray());

        $this->mock(Pix::class)
            ->expects('create')
            ->once()
            ->andReturnTrue();

        $response = (new CreatePix())->execute($dto);

        $this->assertTrue($response);
    }
}
