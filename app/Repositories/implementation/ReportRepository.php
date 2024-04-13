<?php

namespace App\Repositories\implementation;

use App\Models\Report;
use App\Repositories\interface\ReportRepositoryInterface;
use App\DTO\ReportDTO;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\UnauthorizedException;

class ReportRepository  implements ReportRepositoryInterface
{
    public function all()
    {
        return Report::all();
    }

    public function store(ReportDTO $DTO)
    {
        try {
            $report = Report::create($this->getArr($DTO));
            return $report;
        } catch (\Exception $e) {
            throw new \RuntimeException("Error creating Report: " . $e->getMessage());
        }
    }

    public function show(Report $report)
    {
        try {
            return $report;
        } catch (ModelNotFoundException $e) {
            throw new \RuntimeException("User not found: " . $e->getMessage(), $e->getCode(), $e);
        }
    }

    public function update(Report $report, ReportDTO $DTO)
    {
        try {
            return $report->update($this->getArr($DTO));
        } catch (ModelNotFoundException $e) {
            throw new \RuntimeException("Report not found: " . $e->getMessage(), $e->getCode(), $e);
        } catch (UnauthorizedException $e) {
            throw new \RuntimeException("Validation error: " . $e->getMessage(), $e->getCode(), $e);
        }
    }

    public function delete(Report $report)
    {
        try {
            return $report->delete();
        } catch (ModelNotFoundException $e) {
            throw new \RuntimeException("Report not found: " . $e->getMessage(), $e->getCode(), $e);
        }
    }
    private function getArr(ReportDTO $DTO): array
    {
        return [
            "name" => $DTO->name,
        ];
    }
}
