<?php

namespace App\DTO;

use App\Http\Requests\StoreReportRequest;
use App\Http\Requests\UpdateReportRequest;

readonly class ReportSimpleDTO
{
    public function __construct(
        public string $subject,
        public string $content,
        public int $task_id,
        public array $product_id,
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
            product_id: $validatedData["product_id"],
            image: $validatedData["image"],

        );
    }
}
