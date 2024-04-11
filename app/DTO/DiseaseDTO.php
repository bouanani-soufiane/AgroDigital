<?php

namespace App\DTO;

use App\Http\Requests\StoreDiseaseRequest;

readonly class DiseaseDTO
{
    public function __construct(
        public string $name,
        public string $description,
        public string $type,


    ) {
    }

    public static function fromRequest(StoreDiseaseRequest $request)
    {
        $validatedData = $request->validated();
        return new self(
            name: $validatedData["name"],
            description: $validatedData["description"],
            type: $validatedData["type"],

        );
    }
}
