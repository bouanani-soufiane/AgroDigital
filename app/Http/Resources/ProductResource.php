<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'quantity' => $this->quantity,
            'type' => $this->type,
            'employee' => new EmployeeResource($this->employee),
            'image' => (new ImageResource($this->image)),

        ];
    }
}
