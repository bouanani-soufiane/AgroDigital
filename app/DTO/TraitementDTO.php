<?php

namespace App\DTO;

use App\Http\Requests\StoreTraitementRequest;
use App\Http\Requests\UpdateTraitementRequest;
use Tymon\JWTAuth\Facades\JWTAuth;

readonly class TraitementDTO
{
    public function __construct(
        public string $name,
        public string $dateStart,
        public string $dateEnd,
        public int $product_id,
        // public array $images,
        public int $employee_id
    ) {
    }

    public static function fromRequest(StoreTraitementRequest | UpdateTraitementRequest $request)
    {
        $validatedData = $request->validated();
        $user = JWTAuth::user();

        return new self(
            name: $validatedData["name"],
            dateStart: $validatedData["dateStart"],
            dateEnd: $validatedData["dateEnd"],
            product_id: $validatedData["product_id"],
            // images: $validatedData["images"],
            employee_id: $user ? $user->id : null ,
        );
    }
}
