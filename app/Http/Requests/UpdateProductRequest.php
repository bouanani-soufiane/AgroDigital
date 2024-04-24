<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'name' => 'sometimes',
            'quantity' => 'sometimes',
            'type' =>  [
                "sometimes",
                Rule::in(['Herbicide', 'Insecticide', 'Fungicide', 'Nematicide'])
            ],
            'image' => 'sometimes|image'

        ];
    }
}
