<?php

namespace App\DTO;

use App\Http\Requests\StoreUserRequest;

readonly class UserDTO
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
        public string $role,
    ){}

    public static function fromRequest(StoreUserRequest $request)
    {
        $validatedData = $request->validated();
        return new self(
            name: $validatedData['name'],
            email: $validatedData['email'],
            password: $validatedData['password'],
            role: $validatedData['role']
        );
    }
}
