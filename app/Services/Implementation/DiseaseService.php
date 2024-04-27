<?php

namespace App\Services\Implementation;

use App\DTO\DiseaseDTO;
use App\Models\Disease;
use App\Http\Resources\DiseaseResource;
use App\Services\contract\DiseaseServiceInterface;
use App\Repositories\interface\DiseaseRepositoryInterface;

class DiseaseService implements DiseaseServiceInterface
{

    public function __construct(public DiseaseRepositoryInterface $repository)
    {
    }
    public function all()
    {
        return DiseaseResource::collection($this->repository->all());
    }
    public function statistics()
    {
        return $this->repository->statistics();
    }

    public function store(DiseaseDTO $DTO)
    {
        return new DiseaseResource($this->repository->store($DTO));
    }

    public function show(Disease $disease)
    {
        return new DiseaseResource($this->repository->show($disease));
    }

    public function update(Disease $disease, DiseaseDTO $DTO)
    {
        return $this->repository->update($disease, $DTO);
    }

    public function delete(Disease $disease)
    {
        return $this->repository->delete($disease);
    }
}
