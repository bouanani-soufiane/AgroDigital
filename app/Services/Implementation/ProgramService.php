<?php

namespace App\Services\Implementation;

use App\DTO\ProgramDTO;
use App\Models\Program;
use App\DTO\FinishProgramDTO;
use App\Http\Resources\ProgramResource;
use App\Services\contract\ProgramServiceInterface;
use App\Repositories\interface\ProgramRepositoryInterface;

class ProgramService implements ProgramServiceInterface
{

    public function __construct(public ProgramRepositoryInterface $repository)
    {
    }
    public function all()
    {
        return ProgramResource::collection($this->repository->all());
    }

    public function store(ProgramDTO $DTO)
    {
        return new ProgramResource($this->repository->store($DTO));
    }
    public function finish(FinishProgramDTO $DTO)
    {

        return $this->repository->finish($DTO);
    }
    public function show(Program $Program)
    {
        return new ProgramResource($this->repository->show($Program));
    }

    public function update(Program $Program, ProgramDTO $DTO)
    {
        return $this->repository->update($Program, $DTO);
    }

    public function delete(Program $Program)
    {
        return $this->repository->delete($Program);
    }
}
