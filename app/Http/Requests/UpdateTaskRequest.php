<?php

namespace App\Http\Requests;

use App\DTO\TaskDTO;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            "name" => "required|string",
        ];
    }

}
