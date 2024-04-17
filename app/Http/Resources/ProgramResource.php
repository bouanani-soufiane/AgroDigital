<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\StageResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProgramResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'program_name' => $this->name,
            'stage' => new StageResource($this->stage),
        ];
    }
}
