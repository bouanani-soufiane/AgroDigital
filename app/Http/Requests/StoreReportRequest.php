<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReportRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'subject' => 'required',
            'content' => 'required',
            'disease_id' => 'required',
            'product_id' => 'required',
            'task_id' => 'required',

        ];
    }
}
