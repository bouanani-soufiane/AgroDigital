<?php

namespace App\DTO;

use App\Http\Requests\StoreTaskRequest;

readonly class TaskDTO
{
    public function __construct(
        public string $name,

    ) {
    }

    public static function fromRequest(StoreTaskRequest $request)
    {
        $validatedData = $request->validated();
        return new self(
            name: $validatedData["name"],

        );
    }
}
