<?php

namespace Tests\Unit\Pix;

use App\Models\BankDetails;
use App\Models\Pix;
use App\UseCases\Pix\CreatePix;
use App\UseCases\Pix\PixDTO;
use Tests\TestCase;

class CreatePixTest extends TestCase
{
    public function test_should_be_create_pix(): void
    {
        $this->mock(Pix::class)
            ->expects('create')
            ->once()
            ->andReturnTrue();

        $data = [
            'type' => 'celular',
            'value' => '12334425234',
            'idBankDetails' => 1
        ];

        $dto = PixDTO::from($data);
        $result = (new CreatePix())->execute($dto);
        $this->assertTrue($result);
    }
}
