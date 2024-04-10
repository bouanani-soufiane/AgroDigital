<?php

use App\Http\Requests\StoreProgramRequest;

readonly class ProgramDTO
{
    public function __construct(
        public string $body,

    )
    {
    }

    public static function fromRequest(StoreProgramRequest $request)
    {
        $validatedData = $request->validated();
        return new self (
            body: $validatedData["body"],

        );
    }
}
