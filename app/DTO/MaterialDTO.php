<?php

namespace App\DTO;

use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Requests\StoreMaterialRequest;
use App\Http\Requests\UpdateMaterialRequest;

readonly class MaterialDTO
{
    public function __construct(
        public string $name,
        public string $quantity,
        public string $type,
        public string $manufacturer,
        public string $purchase_date,
        public int $employee_id,




    ) {
    }

    public static function fromRequest(StoreMaterialRequest | UpdateMaterialRequest $request)
    {
        $validatedData = $request->validated();
        return new self(
            name: $validatedData["name"],
            quantity: $validatedData["quantity"],
            type: $validatedData["type"],
            manufacturer: $validatedData["manufacturer"],
            purchase_date: $validatedData["purchase_date"],
            employee_id: JWTAuth::user()->id,

        );
    }
}
