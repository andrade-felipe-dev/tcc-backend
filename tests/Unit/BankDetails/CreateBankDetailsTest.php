<?php

namespace Tests\Unit\BankData;

use App\Models\BankDetails;
use App\UseCases\BankDetails\BankDetailsDTO;
use App\UseCases\BankDetails\CreateBankDetails;
use Tests\TestCase;

class CreateBankDetailsTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_should_be_create_bank_data(): void
    {
        $value = BankDetails::factory()->make();

        $dto = BankDetailsDTO::from($value->toArray());

        $this->mock(BankDetails::class)
            ->expects('create')
            ->once()
            ->andReturnTrue();

        $response = (new CreateBankDetails())->execute($dto);

        $this->assertTrue($response);
    }
}
