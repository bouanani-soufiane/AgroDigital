<?php

namespace App\Services\Implementation;

use App\DTO\ReportDTO;
use App\Models\Report;
use App\Http\Resources\ReportResource;
use App\Services\contract\ImageServiceInterface;
use App\Services\contract\ReportServiceInterface;
use App\Repositories\interface\ReportRepositoryInterface;

class ReportService implements ReportServiceInterface
{
    public function __construct(
        public ReportRepositoryInterface $repository,
        public ImageServiceInterface   $imageService,
    ) {
    }
    public function all()
    {
        return ReportResource::collection($this->repository->all());
    }

    public function store(ReportDTO $DTO)
    {
        $report = $this->repository->store($DTO);
        $this->imageService->create($report, $DTO->image);

        return new ReportResource($report);
    }

    public function show(Report $report)
    {
        return new ReportResource($this->repository->show($report));
    }

    public function update(Report $report, ReportDTO $DTO)
    {
        return $this->repository->update($report, $DTO);
    }

    public function delete(Report $report)
    {
        return $this->repository->delete($report);
    }
}
