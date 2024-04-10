<?php

namespace App\Services\Implementation;

use App\DTO\TraitementDTO;
use App\Models\Traitement;
use App\Http\Resources\TraitementResource;
use App\Services\contract\TraitementServiceInterface;
use App\Repositories\interface\TraitementRepositoryInterface;

class TraitementService implements TraitementServiceInterface
{
    public function __construct(public TraitementRepositoryInterface $repository)
    {
    }
    public function all()
    {
        return TraitementResource::collection($this->repository->all());
    }

    public function store(TraitementDTO $DTO)
    {
        return new TraitementResource($this->repository->store($DTO));
    }

    public function show(Traitement $traitement)
    {
        return new TraitementResource($this->repository->show($traitement));
    }

    public function update(Traitement $traitement, TraitementDTO $DTO)
    {
        return $this->repository->update($traitement, $DTO);
    }

    public function delete(Traitement $traitement)
    {
        return $this->repository->delete($traitement);
    }
}
