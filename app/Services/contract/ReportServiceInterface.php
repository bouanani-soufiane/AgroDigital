<?php

namespace App\Services\contract;

use App\DTO\ReportDTO;
use App\Models\Report;
use App\DTO\SurvianceDTO;
use App\DTO\ReportSimpleDTO;
use App\DTO\ReportMagazinierDTO;

interface ReportServiceInterface
{
    public function all();

    public function store(ReportDTO | ReportSimpleDTO | SurvianceDTO | ReportMagazinierDTO $DTO);
    public function show(Report $report);
    public function update(Report $report, ReportDTO $DTO);
    public function delete(Report $report);
}
