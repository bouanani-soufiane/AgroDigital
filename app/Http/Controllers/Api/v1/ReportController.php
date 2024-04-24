<?php

namespace App\Http\Controllers\Api\v1;

use App\DTO\ReportDTO;
use App\DTO\ReportSimpleDTO;
use App\DTO\SurvianceDTO;
use App\Models\Report;
use App\Http\Requests\StoreReportRequest;
use App\Http\Requests\UpdateReportRequest;
use App\Services\contract\ReportServiceInterface;
use App\Http\Controllers\Api\v1\BaseApiController;
use App\Services\contract\UploadImageInterface;

class ReportController extends BaseApiController
{
    public function __construct(public ReportServiceInterface $service, public UploadImageInterface $uploadImage)
    {
    }
    public function index()
    {
        return $this->sendResponse(
            message: "reports list",
            result: $this->service->all()
        );
    }


    public function store(StoreReportRequest $request)
    {
        if (!$request->disease_id) {
            $DTO = ReportSimpleDTO::fromRequest($request);
        } elseif ($request->disease_id && !$request->product_id) {
            $DTO = SurvianceDTO::fromRequest($request);
        } else {
            $DTO = ReportDTO::fromRequest($request);
        }
        $report = $this->service->store($DTO);

        return $this->sendResponse(
            message: "report created successfully",
            result: $report,
            code: 200
        );
    }

    public function show(Report $report)
    {
        // dd($report);
        return $this->sendResponse(
            message: "report retrieved successfully",
            result: $this->service->show($report),
            code: 200
        );
    }


    public function update(UpdateReportRequest $request, Report $report)
    {
        $DTO = ReportDTO::fromRequest($request);
        $report = $this->service->update($report, $DTO);
        return response()->json($report, 200);
    }

    public function destroy(Report $report)
    {
        $this->service->delete($report);

        return response()->json(['message' => 'report deleted successfully'], 200);
    }
}
