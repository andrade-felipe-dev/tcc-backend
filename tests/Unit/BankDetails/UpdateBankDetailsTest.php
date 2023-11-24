<?php

namespace Tests\Unit\BankData;

use App\Models\BankDetails;
use App\UseCases\BankDetails\BankDetailsDTO;
use App\UseCases\BankDetails\UpdateBankDetails;
use Tests\TestCase;

class UpdateBankDetailsTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_should_be_update_bank_data(): void
    {
        $dto = BankDetails::factory()->make();

        $addressMock = $this->createPartialMock(BankDetails::class, ['update']);
        $addressMock->expects($this->once())
            ->method('update')
            ->willReturn(true);

        $useCase = new UpdateBankDetails();
        $dto = BankDetailsDTO::from($dto);

        $useCase->execute($addressMock, $dto);
    }
}
