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

        return Report::with('disease', 'task', 'image')->get();
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
            $report->update($this->getArr($DTO));


            return $report->refresh(); // Refresh the report model with updated data
        } catch (ModelNotFoundException $e) {
            throw new \RuntimeException("Report not found: " . $e->getMessage(), $e->getCode(), $e);
        } catch (UnauthorizedException $e) {
            throw new \RuntimeException("Validation error: " . $e->getMessage(), $e->getCode(), $e);
        }
    }


    public function delete(Report $report)
    {
        try {
            $report->delete();
            return true;
        } catch (ModelNotFoundException $e) {
            throw new \RuntimeException("Report not found: " . $e->getMessage(), $e->getCode(), $e);
        }
    }
    private function getArr(ReportDTO $DTO): array
    {
        return [
            "subject" => $DTO->subject,
            "content" => $DTO->content,
            "disease_id" => $DTO->disease_id,
            "task_id" => $DTO->task_id,
        ];
    }
}
