<?php

namespace App\Http\Controllers\Api\v1;

use App\DTO\ReportDTO;
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
        $reports = $this->service->all();
        return response()->json($reports, 200);
    }


    public function store(StoreReportRequest $request)
    {
        $DTO = ReportDTO::fromRequest($request);
        $report = $this->service->store($DTO);

        return response()->json($report, 201);
    }

    public function show(Report $report)
    {
        $report;

        return response()->json($report, 200);
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
