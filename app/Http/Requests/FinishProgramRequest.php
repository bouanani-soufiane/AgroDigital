<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FinishProgramRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "programData" => "required",

        ];
    }
}
