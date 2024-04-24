<?php

namespace App\DTO;

use App\Http\Requests\StoreReportRequest;
use App\Http\Requests\UpdateReportRequest;

readonly class SurvianceDTO
{
    public function __construct(
        public string $subject,
        public string $content,
        public int $task_id,
        public int $disease_id,
        public object $image
    ) {
    }

    public static function fromRequest(StoreReportRequest | UpdateReportRequest $request)
    {
        $validatedData = $request->validated();
        return new self(
            subject: $validatedData["subject"],
            content: $validatedData["content"],
            task_id: $validatedData["task_id"],
            disease_id: $validatedData["disease_id"],
            image: $validatedData["image"],

        );
    }
}
