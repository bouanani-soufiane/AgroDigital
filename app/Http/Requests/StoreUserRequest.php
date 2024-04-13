<?php

namespace App\Http\Requests;

use App\DTO\UserDTO;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "name" => "required|string",
            "email" => "required|email|unique:employees",
            "password" => "required",
            "role" => "required"
        ];
    }

    public function createDTO(): UserDTO
    {
        return UserDTO::fromRequest($this);
    }
}
