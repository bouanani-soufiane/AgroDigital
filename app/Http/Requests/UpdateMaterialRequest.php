<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMaterialRequest extends FormRequest
{
  
    public function rules(): array
    {
        return [
            'name' => 'required',
            'quantity' => 'required',
            'type' => 'required',
            'manufacturer' => 'required',
            'purchase_date' => 'required',
        ];
    }
}
