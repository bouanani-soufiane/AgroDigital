<?php

namespace App\Services\Implementation;

use App\DTO\MaterialDTO;
use App\Models\Material;
use App\Http\Resources\MaterialResource;
use App\Services\contract\MaterialServiceInterface;
use App\Repositories\interface\MaterialRepositoryInterface;

class MaterialService implements MaterialServiceInterface
{

    public function __construct(public MaterialRepositoryInterface $repository)
    {
    }
    public function all()
    {
        return MaterialResource::collection($this->repository->all());
    }

    public function store(MaterialDTO $DTO)
    {
        return new MaterialResource($this->repository->store($DTO));
    }

    public function show(Material $Material)
    {
        return new MaterialResource($this->repository->show($Material));
    }

    public function update(Material $Material, MaterialDTO $DTO)
    {
        return $this->repository->update($Material, $DTO);
    }

    public function delete(Material $Material)
    {
        return $this->repository->delete($Material);
    }
}
