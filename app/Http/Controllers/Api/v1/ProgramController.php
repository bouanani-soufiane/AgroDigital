<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Program;
use App\Http\Requests\StoreProgramRequest;
use App\Http\Requests\UpdateProgramRequest;
use App\Http\Controllers\Api\v1\BaseApiController;

class ProgramController extends BaseApiController
{
    public function index()
    {
        
    }

    public function create()
    {
        //
    }

    public function store(StoreProgramRequest $request)
    {
        //
    }

    public function show(Program $program)
    {
        //
    }

    public function edit(Program $program)
    {
        //
    }

    public function update(UpdateProgramRequest $request, Program $program)
    {
        //
    }

    public function destroy(Program $program)
    {
        //
    }
}
