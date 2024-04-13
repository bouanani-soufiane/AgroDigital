<?php

namespace App\DTO;

use App\Http\Requests\StoreProductRequest;
use Tymon\JWTAuth\Facades\JWTAuth;

readonly class ProductDTO
{
    public function __construct(
        public string $name,
        public int $quantity,
        public int $stock,
        public string $type,
        public int $employee_id,

    ) {
    }

    public static function fromRequest(StoreProductRequest $request)
    {
        $user = JWTAuth::user();

        $validatedData = $request->validated();
        return new self(
            name: $validatedData["name"],
            quantity: $validatedData["quantity"],
            stock: $validatedData["stock"],
            type: $validatedData["type"],
            employee_id: $user ? $user->id : null,
        );
    }
}
