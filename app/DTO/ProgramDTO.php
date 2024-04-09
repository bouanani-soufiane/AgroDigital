<?php

use App\Http\Requests\StoreAnswerRequest;
use Tymon\JWTAuth\Facades\JWTAuth;

readonly class ProgramDTO
{
    public function __construct(
        public string $body,

    )
    {
    }

    public static function fromRequest(Request $request)
    {
        $validatedData = $request->validated();
        return new self (
            body: $validatedData["body"],

        );
    }
}