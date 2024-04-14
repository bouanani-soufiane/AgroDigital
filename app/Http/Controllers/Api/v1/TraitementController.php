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
        return $this->sendResponse(
            message: "traitements list",
            result: $this->service->all()
        );
    }


    public function store(StoreTraitementRequest $request)
    {
        $DTO = TraitementDTO::fromRequest($request);
        $traitement = $this->service->store($DTO);
        return $this->sendResponse(
            message: "Traitement created successfully",
            result: $traitement,
            code: 201
        );
    }

    public function show(Traitement $traitement)
    {
        return $this->sendResponse(
            message: "traitement retrieved successfully",
            result: $this->service->show($traitement),
            code: 201
        );
    }


    public function update(UpdateTraitementRequest $request, Traitement $traitement)
    {
        $DTO = TraitementDTO::fromRequest($request);
        $traitement = $this->service->update($traitement, $DTO);
        return $this->sendResponse(
            message: "traitement updated successfully",
            code: 201
        );
    }

    public function destroy(Traitement $traitement)
    {
        $this->service->delete($traitement);

        return $this->sendResponse(message: "Traitement deleted", result: true);
    }
}
