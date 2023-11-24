<?php

namespace Tests\Feature;

use App\Models\BankDetails;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BankDetailsTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = $this->authUser();
    }

    public function test_should_be_get_a_bank_data_with_id(): void
    {
        $bankData = BankDetails::factory()->create();

        $response = $this->getJson(route('bank-details.show', $bankData->id));
        $response->assertStatus(200);

        $response->assertJson([
            'data' => [
                'id' => 1,
                'name' => $bankData->name,
                'agency' => $bankData->agency,
                'account' => $bankData->account
            ]
        ]);
    }

    public function test_should_be_create_bank_data(): void
    {
        $bankData = BankDetails::factory()->make();

        $data = [
            'name' => $bankData->name,
            'agency' => $bankData->agency,
            'account' => $bankData->account
        ];

        $response = $this->postJson(route('bank-details.store'), $data);
        $response->assertStatus(201);
    }

    public function test_should_be_pass_invalid_parameter_and_return_error(): void
    {
        $data = [
            'name' => 'Va'
        ];

        $response = $this->postJson(route('bank-details.store'), $data);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['name', 'agency', 'account']);
    }

    public function test_should_be_update_bank_data(): void
    {
        BankDetails::factory()->create([
            'id' => 1
        ]);

        $data = [
            'id' => 1,
            'name' => 'Conta atualizada',
            'agency' => 111,
            'account' => 1234
        ];

        $response = $this->putJson(route('bank-details.update', $data['id']), $data);

        $response->assertStatus(200);

        $response->assertJson([
            'data' => [
                'id' => 1,
                'name' => $data['name'],
                'agency' => $data['agency'],
                'account' => $data['account'],
            ]
        ]);
    }
}
