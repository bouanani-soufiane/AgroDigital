<?php

namespace App\Http\Requests;

use App\Models\Program;
use Illuminate\Foundation\Http\FormRequest;

class StoreProgramRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->can('create', Program::class);
    }
    public function rules(): array
    {
        return [
            'program_name' => 'required',
            'stage_name' => 'required',
            'stage_duration' => 'required',
            'attribute_name' => 'required | array',
            'attribute_value' => '',
            'cultur_name' => 'required',
        ];
    }
}
