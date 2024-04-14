<?php


namespace App\Http\Controllers\Api\v1;

use App\DTO\MaterialDTO;
use App\Models\Material;
use App\Http\Requests\StoreMaterialRequest;
use App\Http\Requests\UpdateMaterialRequest;
use App\Services\contract\MaterialServiceInterface;
use App\Http\Controllers\Api\v1\BaseApiController;

class MaterialController extends BaseApiController
{
    public function __construct(public MaterialServiceInterface $service)
    {
    }

    public function index()
    {
        return $this->sendResponse(
            message: "Materials list",
            result: $this->service->all()
        );
    }


    public function store(StoreMaterialRequest $request)
    {
        $DTO = MaterialDTO::fromRequest($request);
        // \Log::info('Received data: ' . json_encode($DTO));
        $material = $this->service->store($DTO);
        return $this->sendResponse(
            message: "Material created successfully",
            result: $material,
            code: 201
        );
    }

    public function show(Material $material)
    {
        return $this->sendResponse(
            message: "Material retrieved successfully",
            result: $this->service->show($material),
            code: 200
        );
    }


    public function update(UpdateMaterialRequest $request, Material $material)
    {
        $DTO = MaterialDTO::fromRequest($request);
        $material = $this->service->update($material, $DTO);
        return $this->sendResponse(
            message: "Material updated successfully",
            code: 201
        );
    }

    public function destroy(Material $material)
    {
        $this->service->delete($material);

        return $this->sendResponse(message: "Material deleted", result: true , code: 204);
    }
}
