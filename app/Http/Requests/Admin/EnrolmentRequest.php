<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EnrolmentRequest extends FormRequest
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
            "student" => 'bail|required',
            'package' => 'bail|required',
            "start_date" => 'bail|required|date|after_or_equal:today',
            'slot' => 'bail|required',
        ];

        if ($this->discount_amount != null) {
            $rules['discount_type'] = ['required'];
        }

        if ($this->duration_time != null) {
            $rules['duration_type'] = ['required'];
        }

        return $rules;
    }
}
