<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Enums\TaskStatus;
use App\Enums\TaskType;

class TaskResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            'name' => $this->name,
            'Description' => $this->Description,
            'DateStart' => $this->DateStart,
            'DateEnd' => $this->DateEnd,
            'Status' => TaskStatus::from($this->Status)->value,
            'TypeTask' => TaskType::from($this->TypeTask)->value,
            'employee' => new EmployeeResource($this->employee),

        ];
    }
}
