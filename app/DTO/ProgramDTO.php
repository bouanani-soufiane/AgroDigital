<?php

namespace App\DTO;

use App\Http\Requests\StoreProgramRequest;
use App\Http\Requests\UpdateProgramRequest;

readonly class ProgramDTO
{
    public function __construct(
        public string $program_name,
        public string $stage_name,
        public int $stage_duration,
        public string $attribute_name
    ) {
    }

    public static function fromRequest(StoreProgramRequest | UpdateProgramRequest $request)
    {
        $validatedData = $request->validated();
        return new self(
            program_name: $validatedData["program_name"],
            stage_name: $validatedData["stage_name"],
            stage_duration: $validatedData["stage_duration"],
            attribute_name: $validatedData["attribute_name"],
        );
    }
}
