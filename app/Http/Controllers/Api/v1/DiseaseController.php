<?php

namespace App\Http\Controllers\Api\v1;

use App\DTO\DiseaseDTO;
use App\Models\Disease;
use App\Http\Requests\StoreDiseaseRequest;
use App\Http\Requests\UpdateDiseaseRequest;
use App\Http\Controllers\Api\v1\BaseApiController;
use App\Services\contract\DiseaseServiceInterface;

class DiseaseController extends BaseApiController
{

    public function __construct(public DiseaseServiceInterface $service)
    {
    }
    public function index()
    {
        $disease = $this->service->all();
        return $this->sendResponse(
            message: "disease retrieved successfully !",
            result: $disease,
            code: 200
        );
    }

    public function store(StoreDiseaseRequest $request)
    {
        $DTO = DiseaseDTO::fromRequest($request);
        $disease = $this->service->store($DTO);
        return response()->json($disease, 201);
    }

    public function show(Disease $disease)
    {
        return response()->json($disease, 200);
    }



    public function update(UpdateDiseaseRequest $request, Disease $disease)
    {
        $DTO = DiseaseDTO::fromRequest($request);
        $disease = $this->service->update($disease, $DTO);
        return response()->json($disease, 200);
    }

    public function destroy(Disease $disease)
    {
        $this->service->delete($disease);

        return response()->json(['message' => 'disease deleted successfully'], 200);
    }
}
