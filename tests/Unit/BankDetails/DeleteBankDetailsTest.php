<?php

namespace Tests\Unit\BankData;

use App\Models\BankDetails;
use App\UseCases\BankDetails\DeleteBankDetails;
use Tests\TestCase;

class DeleteBankDetailsTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_should_be_delete_bank_data(): void
    {
        $bankDataMock = $this->getMockBuilder(BankDetails::class)
            ->getMock();

        $bankDataMock->expects($this->once())
            ->method('delete')
            ->willReturn(true);

        $result = (new DeleteBankDetails())->execute($bankDataMock);

        $this->assertTrue($result);
    }
}
