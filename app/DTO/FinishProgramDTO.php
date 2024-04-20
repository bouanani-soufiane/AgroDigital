<?php

namespace App\DTO;

use App\Http\Requests\FinishProgramRequest;

readonly class FinishProgramDTO
{
    public function __construct(
        public array $programData,

    ) {
    }

    public static function fromRequest(FinishProgramRequest  $request)
    {
        $validatedData = $request->validated();
        return new self(
            programData: $validatedData["programData"],

        );
    }
}
