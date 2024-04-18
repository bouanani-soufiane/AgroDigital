<?php

namespace App\DTO;

use App\Http\Requests\StoreProgramRequest;
use App\Http\Requests\UpdateProgramRequest;

readonly class ProgramDTO
{
    public function __construct(
        public string $program_name,
        public string $cultur_name,
        public array $stage_name,
        public array $attribute_value = [],
        public array $attribute_name
    ) {
    }

    public static function fromRequest(StoreProgramRequest | UpdateProgramRequest $request)
    {
        $validatedData = $request->validated();
        return new self(
            program_name: $validatedData["program_name"],
            stage_name: $validatedData["stage_name"],
            attribute_name: $validatedData["attribute_name"],
            attribute_value: $validatedData["attribute_value"],
            cultur_name: $validatedData["cultur_name"],
        );
    }
}
