<?php

namespace App\Http\Requests;

use App\Models\Report;
use Illuminate\Foundation\Http\FormRequest;

class StoreReportRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->can('create', Report::class);
    }
    public function rules(): array
    {
        return [
            'subject' => 'required',
            'content' => 'required',
            'disease_id' => '',
            'product_id.*' => '',
            'product_id' => 'nullable|array',
            'task_id' => 'required',
            'image' => 'required|image'
        ];
    }
}
