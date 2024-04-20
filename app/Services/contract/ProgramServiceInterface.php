<?php

namespace App\Services\contract;

use App\DTO\ProgramDTO;
use App\Models\Program;
use App\DTO\FinishProgramDTO;

interface ProgramServiceInterface
{
    public function all();
    public function store(ProgramDTO $DTO);
    public function finish(FinishProgramDTO $DTO);

    public function show(Program $Program);
    public function update(Program $Program, ProgramDTO $DTO);
    public function delete(Program $Program);
}
