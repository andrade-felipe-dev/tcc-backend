<?php

namespace Tests\Unit\Address;

use App\Models\Address;
use App\UseCases\Address\AddressDTO;
use App\UseCases\Address\CreateAddress;
use Tests\TestCase;

class CreateAddressTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function test_should_be_execute_use_case(): void
    {
        $data = Address::factory()->make();
        $data['postalCode'] = $data->postal_code;
        unset($data['postal_code']);
        $dto = AddressDTO::from($data->toArray());

        $this->mock(Address::class)
            ->expects('create')
            ->andReturnTrue();

        $result = (new CreateAddress())->execute($dto);

        $this->assertTrue($result);
    }
}
