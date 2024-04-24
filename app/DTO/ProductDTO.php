<?php

namespace App\DTO;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Tymon\JWTAuth\Facades\JWTAuth;

readonly class ProductDTO
{
    public function __construct(
        public string $name,
        public int $quantity,
        public string $type,
        public int $employee_id,
        public object $image,
    ) {
    }

    public static function fromRequest(StoreProductRequest | UpdateProductRequest $request)
    {
        $validatedData = $request->validated();
        return new self(
            name: $validatedData["name"],
            quantity: $validatedData["quantity"],
            type: $validatedData["type"],
            image: $validatedData["image"],
            employee_id: JWTAuth::user()->id,
        );
    }
}
