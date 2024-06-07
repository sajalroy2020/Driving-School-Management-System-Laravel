<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ReportRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            "module_name" => ['required'],
            "duration" => ['required'],
        ];
        if ($this->duration == 4){
            $rules['start_date'] = ['required'];
            $rules['end_date'] = ['required'];
        }
        return $rules;
    }
}
