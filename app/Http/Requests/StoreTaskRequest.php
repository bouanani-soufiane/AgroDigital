<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Enums\TaskType;

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
                "sometimes",
                "nullable",
                Rule::in(TaskType::cases()),
            ],
            "employee_id" => "required",
        ];
    }

}

