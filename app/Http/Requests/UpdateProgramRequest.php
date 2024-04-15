<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProgramRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'program_name' => 'required',
            'stage_name' => 'required',
            'stage_duration' => 'required',
            'attribute_name' => 'required',
        ];
    }
}
