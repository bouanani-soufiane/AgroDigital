<?php

namespace App\Repositories\implementation;

use App\Models\Program;
use App\Repositories\interface\ProgramRepositoryInterface;
use App\DTO\ProgramDTO;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\UnauthorizedException;

class ProgramRepository  implements ProgramRepositoryInterface
{
    public function all()
    {

        return Program::all();
    }

    public function store(ProgramDTO $DTO)
    {
        $program = Program::create([
            "program_name" => $DTO->program_name,
        ]);
        


    }

    public function show(Program $Program)
    {
        try {
            return $Program;
        } catch (ModelNotFoundException $e) {
            throw new \RuntimeException("User not found: " . $e->getMessage(), $e->getCode(), $e);
        }
    }

    public function update(Program $Program, ProgramDTO $DTO)
    {
        try {
            return $Program->update($this->getArr($DTO));
        } catch (ModelNotFoundException $e) {
            throw new \RuntimeException("Program not found: " . $e->getMessage(), $e->getCode(), $e);
        } catch (UnauthorizedException $e) {
            throw new \RuntimeException("Validation error: " . $e->getMessage(), $e->getCode(), $e);
        }
    }

    public function delete(Program $Program)
    {
        try {
            return $Program->delete();
        } catch (ModelNotFoundException $e) {
            throw new \RuntimeException("Program not found: " . $e->getMessage(), $e->getCode(), $e);
        }
    }
    private function getArr(ProgramDTO $DTO): array
    {
        return [
            "program_name" => $DTO->program_name,
            "stage_name" => $DTO->stage_name,
            "stage_duration" => $DTO->stage_duration,
            "attribute_name" => $DTO->attribute_name,
        ];
    }
}


