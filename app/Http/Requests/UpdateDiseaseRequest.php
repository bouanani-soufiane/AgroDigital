<?php

namespace App\Http\Requests;

use App\Models\Disease;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDiseaseRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->can('update', Disease::class);
    }


    public function rules(): array
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'type' => 'required',
        ];
    }
}
