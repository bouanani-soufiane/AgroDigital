<?php

namespace App\Http\Requests;

use App\DTO\TaskDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTaskRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "name" => "required|string",
            "Description" => "required|string",
            "DateStart" => "required|string",
            "DateEnd" => "required|string",
            "Status" => [
                "required",
                Rule::in(['Pending', 'Done', 'Cancelled'])
            ],
            "TypeTask" => [
                "required",
                Rule::in(['Traitement', 'Surviance', 'Irrigation', 'Fertigation'])
            ],
        ];
    }

}

