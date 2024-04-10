<?php

namespace App\Repositories\interface;

use App\DTO\ReportDTO;
use App\Models\Report;

interface ReportRepositoryInterface
{
    public function all();

    public function store(ReportDTO $DTO);

    public function show(Report $report);

    public function update(Report $report, ReportDTO $DTO);

    public function delete(Report $report);
}
