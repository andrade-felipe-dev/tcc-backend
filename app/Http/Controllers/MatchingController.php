<?php

namespace App\Http\Controllers;

use App\Http\Requests\MatchingRequest;
use App\Http\Resources\MatchingResource;
use App\UseCases\Matching\CreateMatching;
use App\UseCases\Matching\MatchingDTO;
use Illuminate\Http\Request;

class MatchingController extends Controller
{
    public function store(MatchingRequest $request)
    {
        $dto = MatchingDTO::from($request->validated());

        (new CreateMatching())->execute($dto);

        return response()->json(null, 201);
    }

    public function index(Request $request)
    {
        return pagination(Matching::class)
            ->where('id_entity', $request->user()->id)
            ->resource(MatchingResource::class);
    }
}
