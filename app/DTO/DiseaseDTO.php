<?php

namespace App\DTO;

use App\Http\Requests\StoreDiseaseRequest;
use App\Http\Requests\UpdateDiseaseRequest;

readonly class DiseaseDTO
{
    public function __construct(
        public string $name,
        public string $description,
        public string $type,


    ) {
    }

    public static function fromRequest(StoreDiseaseRequest | UpdateDiseaseRequest $request)
    {
        $validatedData = $request->validated();
        return new self(
            name: $validatedData["name"],
            description: $validatedData["description"],
            type: $validatedData["type"],

        );
    }
}
