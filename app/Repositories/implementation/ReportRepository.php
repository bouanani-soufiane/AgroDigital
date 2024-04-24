<?php

namespace App\Repositories\implementation;

use App\DTO\ReportDTO;
use App\Models\Report;
use App\DTO\ReportSimpleDTO;
use App\DTO\SurvianceDTO;
use Illuminate\Validation\UnauthorizedException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Repositories\interface\ReportRepositoryInterface;

class ReportRepository  implements ReportRepositoryInterface
{
    public function all()
    {
        $test = Report::with('disease', 'task', 'image','products')->orderBy('updated_at', 'desc')->get();
    }

    public function store(ReportDTO | ReportSimpleDTO | SurvianceDTO $DTO)
    {
        try {
            if (!property_exists($DTO, 'disease_id')) {
                $report = Report::create([
                    "subject" => $DTO->subject,
                    "content" => $DTO->content,
                    "task_id" => $DTO->task_id,
                ]);
                $report->products()->sync($DTO->product_id[0]);
            } elseif (property_exists($DTO, 'disease_id') && !property_exists($DTO, 'product_id')) {
                $report = Report::create([
                    "subject" => $DTO->subject,
                    "content" => $DTO->content,
                    "task_id" => $DTO->task_id,
                    "disease_id" => $DTO->disease_id,

                ]);
            } else {
                $report = Report::create($this->getArr($DTO));
                $report->products()->sync($DTO->product_id);
            }
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
            return $report->refresh();
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
