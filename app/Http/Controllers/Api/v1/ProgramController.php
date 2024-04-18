<?php

namespace App\Http\Controllers\Api\v1;

use App\DTO\ProgramDTO;
use App\Models\Program;
use App\Http\Requests\StoreProgramRequest;
use App\Http\Requests\UpdateProgramRequest;
use App\Services\contract\ProgramServiceInterface;
use App\Http\Controllers\Api\v1\BaseApiController;

class ProgramController extends BaseApiController
{
    public function __construct(public ProgramServiceInterface $service)
    {
    }

    public function index()
    {
        return $this->sendResponse(
            message: "Programs list",
            result: $this->service->all()
        );
    }


    public function store(StoreProgramRequest $request)
    {

        $DTO = ProgramDTO::fromRequest($request);
        $Program = $this->service->store($DTO);

        return $this->sendResponse(
            message: "Program created successfully",
            result: $Program,
            code: 201
        );
    }

    public function show(Program $Program)
    {
        return $this->sendResponse(
            message: "Program retrieved successfully",
            result: $this->service->show($Program),
            code: 200
        );
    }


    public function update(UpdateProgramRequest $request, Program $Program)
    {
        $DTO = ProgramDTO::fromRequest($request);

        // dd($DTO);
        $Program = $this->service->update($Program, $DTO);
        return $this->sendResponse(
            message: "Program updated successfully",
            code: 200
        );
    }
    public function destroy(Program $Program)
    {
        $this->service->delete($Program);

        return $this->sendResponse(message: "Program deleted", result: true, code: 204);
    }
}
