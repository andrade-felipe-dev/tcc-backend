<?php

namespace App\Http\Controllers;

use App\Http\Requests\PixRequest;
use App\Http\Resources\PixResource;
use App\Models\Pix;
use App\UseCases\Pix\CreatePix;
use App\UseCases\Pix\DeletePix;
use App\UseCases\Pix\PixDTO;
use App\UseCases\Pix\UpdatePix;
use Illuminate\Http\Request;

class PixController extends Controller
{
    public function store(PixRequest $request)
    {
        $dto = PixDTO::from($request->validated());

        (new CreatePix())->execute($dto);

        return response()->json(null, 201);
    }

    public function update(PixRequest $request, Pix $pix)
    {
        $pix->loadMissing('bankDetails');

        $dto = PixDTO::from($request->validated());

        $response = (new UpdatePix())->execute($pix, $dto);

        return PixResource::make($response);
    }

    public function destroy(Pix $pix)
    {
        (new DeletePix())->execute($pix);

        return response()->noContent();
    }
}
