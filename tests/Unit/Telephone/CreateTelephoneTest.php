<?php

namespace Tests\Unit\Telephone;

use App\Models\Telephone;
use App\UseCases\Telephone\CreateTelephone;
use App\UseCases\Telephone\TelephoneDTO;
use Tests\TestCase;

class CreateTelephoneTest extends TestCase
{
    public function test_should_be_create_telephone(): void
    {
        $value = Telephone::factory()->make();

        $dto = TelephoneDTO::from($value->toArray());

        $this->mock(Telephone::class)
            ->expects('create')
            ->once()
            ->andReturnTrue();

        $response = (new CreateTelephone())->execute($dto);

        $this->assertTrue($response);
    }
}
