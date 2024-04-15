<?php

namespace App\Repositories\interface;

use App\DTO\ProgramDTO;
use App\Models\Program;


interface ProgramRepositoryInterface
{
    public function all();

    public function store(ProgramDTO $DTO);

    public function show(Program $Program);

    public function update(Program $Program, ProgramDTO $DTO);

    public function delete(Program $Program);
}
