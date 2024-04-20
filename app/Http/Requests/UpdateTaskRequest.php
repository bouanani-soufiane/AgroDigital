<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;


use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            "name" => "required|string",
            "Description" => "required|string",
            "DateStart" => "required|string",
            "DateEnd" => "required|string",
            "employee_id" => "",
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
