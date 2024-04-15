<?php

namespace App\DTO;

use App\Http\Requests\StoreReportRequest;
use App\Http\Requests\UpdateReportRequest;

readonly class ReportDTO
{
    public function __construct(
        public string $subject,
        public string $content,
        public int $disease_id,
        public array $product_id,
        public int $task_id,


    ) {
    }

    public static function fromRequest(StoreReportRequest | UpdateReportRequest $request)
    {
        $validatedData = $request->validated();
        return new self(
            subject: $validatedData["subject"],
            content: $validatedData["content"],
            disease_id: $validatedData["disease_id"],
            product_id: $validatedData["product_id"],
            task_id: $validatedData["task_id"],
        );
    }
}
