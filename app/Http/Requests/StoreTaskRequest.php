<?php

namespace App\Http\Requests;

use App\Enums\TaskType;
use App\Models\Task;
use Illuminate\Validation\Rule;
use App\Rules\GreaterThanCurrentDate;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    
    public function rules(): array
    {
        return [
            "name" => "required|string",
            "Description" => "required|string",
            "DateStart" => "required| date| after:" . now(),
            "DateEnd" => "required| date| after:" . now(),
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
