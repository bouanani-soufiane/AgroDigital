<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReportRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'subject' => 'required',
            'content' => 'required',
            'disease_id' => 'required',
            'task_id' => 'required',
            'image' => 'required|image'

        ];
    }
}
