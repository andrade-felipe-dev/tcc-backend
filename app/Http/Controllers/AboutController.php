<?php

namespace App\Http\Controllers;

use App\Http\Requests\AboutRequest;
use App\Http\Resources\AboutResource;
use App\UseCases\About\AboutDTO;
use App\UseCases\About\AboutManager;

class AboutController extends Controller
{
    public function show(AboutManager $aboutManager)
    {
        return AboutResource::make($aboutManager->getAbout());
    }

    public function update(AboutRequest $request, AboutManager $aboutManager): AboutResource
    {
        $data = AboutDTO::from($request->validated());
        $updateAbout =  $aboutManager->updateAbout($data);

        return AboutResource::make($updateAbout);
    }
}
