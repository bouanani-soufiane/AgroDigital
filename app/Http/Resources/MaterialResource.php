<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MaterialResource extends JsonResource
{
    
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            'name' => $this->name,
            'quantity' => $this->quantity,
            'type' => $this->type,
            'manufacturer' => $this->manufacturer,
            'purchase_date' => $this->purchase_date,
            'employee' => new EmployeeResource($this->employee),

        ];
    }
}
