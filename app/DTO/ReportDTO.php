<?php

namespace App\DTO;

use App\Http\Requests\StoreReportRequest;

readonly class ReportDTO
{
    public function __construct(public string $name)
    {
    }

    public static function fromRequest(StoreReportRequest $request)
    {
        $validatedData = $request->validated();
        return new self(
            name: $validatedData["name"],

        );
    }
}
