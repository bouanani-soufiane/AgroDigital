<?php

namespace App\DTO;

use App\Http\Requests\StoreTraitementRequest;

readonly class TraitementDTO
{
    public function __construct(public string $name)
    {
    }

    public static function fromRequest(StoreTraitementRequest $request)
    {
        $validatedData = $request->validated();
        return new self(
            name: $validatedData["name"],
        );
    }
}
