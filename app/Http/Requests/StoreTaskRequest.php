<?php

namespace App\Http\Requests;

use App\Enums\TaskType;
use Illuminate\Validation\Rule;
use App\Rules\GreaterThanCurrentDate;
use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "name" => "required|string",
            "Description" => "required|string",
            "DateStart" => ['required', 'date', new GreaterThanCurrentDate],
            "DateEnd" => ['required', 'date', new GreaterThanCurrentDate],
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

