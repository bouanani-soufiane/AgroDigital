<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDiseaseRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'name' => 'required',
        ];
    }
}
