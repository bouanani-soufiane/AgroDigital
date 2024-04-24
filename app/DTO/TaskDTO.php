<?php

namespace App\DTO;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

readonly class TaskDTO
{
    public function __construct(
        public string $name,
        public string $Description,
        public string $DateStart,
        public string $DateEnd,
        public string $Status,
        public ?string $TypeTask,
        public int $employee_id,

    ) {
    }

    public static function fromRequest(StoreTaskRequest | UpdateTaskRequest $request)
    {
        $validatedData = $request->validated();

        return new self(
            name: $validatedData["name"],
            Description: $validatedData["Description"],
            DateStart: $validatedData["DateStart"],
            DateEnd: $validatedData["DateEnd"],
            Status: $validatedData["Status"],
            TypeTask: $validatedData["TypeTask"] ?? null,
            employee_id: $validatedData["employee_id"],
        );
    }
}
