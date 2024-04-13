<?php

namespace App\DTO;

use App\Http\Requests\StoreTaskRequest;

readonly class TaskDTO
{
    public function __construct(
        public string $name,
        public string $Description,
        public string $DateStart,
        public string $DateEnd,
        public string $Status,
        public string $TypeTask,
    ) {
    }

    public static function fromRequest(StoreTaskRequest $request)
    {
        $validatedData = $request->validated();
        return new self(
            name: $validatedData["name"],
            Description: $validatedData["Description"],
            DateStart: $validatedData["DateStart"],
            DateEnd: $validatedData["DateEnd"],
            Status: $validatedData["Status"],
            TypeTask: $validatedData["TypeTask"],

        );
    }
}
