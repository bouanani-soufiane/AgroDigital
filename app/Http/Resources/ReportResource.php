<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReportResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            'subject' => $this->subject,
            'content' => $this->content,
            'updated_at' => $this->updated_at,
            'disease' => new DiseaseResource($this->disease),
            'task' => new TaskResource($this->task),
            'image' => (new ImageResource($this->image)),
            'products' => ProductResource::collection($this->products)
        ];
    }
}
