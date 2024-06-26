<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TraitementResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'dateStart' => $this->dateStart,
            'dateEnd' => $this->dateEnd,
            "product" => new ProductResource($this->product),
            'employee' => new EmployeeResource($this->employee),
        ];
    }
}
