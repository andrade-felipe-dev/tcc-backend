<?php

namespace Tests\Unit\Address;

use App\Models\Address;
use App\UseCases\Address\AddressDTO;
use App\UseCases\Address\UpdateAddress;
use Tests\TestCase;
use Mockery;

class UpdateAddressTest extends TestCase
{
    public function test_should_be_execute_use_case(): void
    {
        $address = Address::factory()->make();
        $data = [
            ...$address->toArray(),
            'postalCode' => $address->postal_code
        ];
        unset($data['postal_code']);

        $addressMock = $this->createPartialMock(Address::class, ['update']);
        $addressMock->expects($this->once())
            ->method('update')
            ->willReturn(true);

        $useCase = new UpdateAddress();
        $dto = AddressDTO::from($data);

        $useCase->execute($addressMock, $dto);
    }
}
