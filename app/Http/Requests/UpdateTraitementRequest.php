<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTraitementRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "name" => "required|string",
            "dateStart" => "required|string",
            "dateEnd" => "required|string",
            "product_id" => "required",
        ];
    }
}
