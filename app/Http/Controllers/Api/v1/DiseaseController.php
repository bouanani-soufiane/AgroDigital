<?php

namespace App\Http\Controllers\Api\v1;

use App\DTO\DiseaseDTO;
use App\Models\Disease;
use App\Http\Requests\StoreDiseaseRequest;
use App\Http\Requests\UpdateDiseaseRequest;
use App\Http\Controllers\Api\v1\BaseApiController;
use App\Services\contract\DiseaseServiceInterface;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DiseaseController extends BaseApiController
{
    use AuthorizesRequests;

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


    public function statistics()
    {
        $disease = $this->service->statistics();
        return $this->sendResponse(
            message: "disease statistics !",
            result: $disease,
            code: 200
        );
    }



    public function store(StoreDiseaseRequest $request)
    {
        $DTO = DiseaseDTO::fromRequest($request);
        $disease = $this->service->store($DTO);
        return $this->sendResponse(
            message: "disease created successfully",
            result: $disease,
            code: 201
        );
    }

    public function show(Disease $disease)
    {
        return $this->sendResponse(
            message: "disease retrieved successfully",
            result: $this->service->show($disease),
            code: 201
        );
    }



    public function update(UpdateDiseaseRequest $request, Disease $disease)
    {
        $DTO = DiseaseDTO::fromRequest($request);
        $disease = $this->service->update($disease, $DTO);
        return $this->sendResponse(
            message: "disease updated successfully",
            code: 201
        );
    }

    public function destroy(Disease $disease)
    {
        $this->authorize("delete", $disease);
        $this->service->delete($disease);

        return $this->sendResponse(message: "disease deleted", result: true);
    }
}
