<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProductRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->can('create', Product::class);
    }
    public function rules(): array
    {
        return [
            'name' => 'required',
            'quantity' => 'required',
            'type' =>  [
                "required",
                Rule::in(['Herbicide', 'Insecticide', 'Fungicide', 'Nematicide'])
            ],
            'image' => 'required|image'
        ];
    }
}
