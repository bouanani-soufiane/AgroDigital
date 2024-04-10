<?php

namespace App\Http\Controllers\Api\v1;

use App\DTO\TraitementDTO;
use App\Models\Traitement;
use App\Http\Requests\StoreTraitementRequest;
use App\Http\Requests\UpdateTraitementRequest;
use App\Services\contract\TraitementServiceInterface;
use App\Http\Controllers\Api\v1\BaseApiController;

class TraitementController extends BaseApiController
{
    public function __construct(public TraitementServiceInterface $service)
    {
    }

    public function index()
    {
        $traitements = $this->service->all();
        return response()->json($traitements, 200);
    }


    public function store(StoreTraitementRequest $request)
    {
        $DTO = TraitementDTO::fromRequest($request);
        $Traitement = $this->service->store($DTO);
        return response()->json($Traitement, 201);
    }

    public function show(Traitement $Traitement)
    {
        return response()->json($Traitement, 200);
    }


    public function update(UpdateTraitementRequest $request, Traitement $Traitement)
    {
        $DTO = TraitementDTO::fromRequest($request);
        $Traitement = $this->service->update($Traitement, $DTO);
        return response()->json($Traitement, 200);
    }

    public function destroy(Traitement $Traitement)
    {
        $this->service->delete($Traitement);

        return response()->json(['message' => 'Traitement deleted successfully'], 200);
    }
}
