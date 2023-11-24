<?php

namespace Tests\Feature;

use App\Models\BankDetails;
use App\Models\Pix;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PixTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = $this->authUser();
    }

    public function test_should_be_create_pix(): void
    {
        $bankDetails = BankDetails::factory()->create();

        $data = [
            'type' => 'teste',
            'value' => 'teste',
            'idBankDetails' => $bankDetails->id
        ];

        $response = $this->postJson(route('pix.store'), $data);
        $response->assertStatus(201);

        $this->assertInstanceOf( Pix::class, $bankDetails->pix->first());
    }

    public function test_should_be_update_pix(): void
    {
        $pix = Pix::factory()->create([
            'id' => 1,
        ]);

        $data = [
            'id' => 1,
            'type' => 'teste',
            'value' => 'teste',
            'idBankDetails' => $pix->id_bank_details
        ];

        $response = $this->putJson(route('pix.update', $data['id']), $data);

        $response->assertStatus(200);
        $response->assertJson([
            'data' => [
                'id' => 1,
                'type' => $data['type'],
                'value' => $data['value']
            ]
        ]);

        $this->assertInstanceOf(BankDetails::class, $pix->bankDetails()->first());
    }
}
