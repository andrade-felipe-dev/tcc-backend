<?php

namespace Tests\Unit\Telephone;

use App\Models\Telephone;
use App\UseCases\Telephone\TelephoneDTO;
use App\UseCases\Telephone\UpdateTelephone;
use Tests\TestCase;

class UpdateTelephoneTest extends TestCase
{
    public function test_should_be_update_telephone(): void
    {
        $telephone = Telephone::factory()->make();

        $telephoneMock = $this->createPartialMock(Telephone::class, ['update']);
        $telephoneMock->expects($this->once())
            ->method('update')
            ->willReturn(true);


        $dto = TelephoneDTO::from($telephone);

        (new UpdateTelephone())->execute($telephoneMock, $dto);
    }
}
