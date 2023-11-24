<?php

namespace App\Http\Controllers;

use App\Http\Requests\BankDetailsRequest;
use App\Http\Resources\BankDetailsResource;
use App\Models\BankDetails;
use App\UseCases\BankDetails\BankDetailsDTO;
use App\UseCases\BankDetails\CreateBankDetails;
use App\UseCases\BankDetails\DeleteBankDetails;
use App\UseCases\BankDetails\FindByIdBankData;
use App\UseCases\BankDetails\UpdateBankDetails;

class BankDetailsController extends Controller
{
    public function show(BankDetails $bankDetail)
    {
        $bankDetail->loadMissing('pix');

        return BankDetailsResource::make($bankDetail);
    }

    public function store(BankDetailsRequest $request)
    {
        $dto = BankDetailsDTO::from($request->validated());

        (new CreateBankDetails())->execute($dto);

        return response()->json(null, 201);
    }

    public function update(BankDetails $bankDetail, BankDetailsRequest $request)
    {
        $bankDetail->loadMissing('pix');

        $dto = BankDetailsDTO::from($request->validated());
        $response = (new UpdateBankDetails())->execute($bankDetail, $dto);

        return BankDetailsResource::make($response);
    }

    public function destroy(BankDetails $bankDetail)
    {
        (new DeleteBankDetails())->execute($bankDetail);

        return response()->noContent();
    }
}
