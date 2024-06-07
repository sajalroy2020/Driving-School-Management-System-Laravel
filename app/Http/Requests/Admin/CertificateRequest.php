<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CertificateRequest extends FormRequest
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
            'certificate_date' => 'bail|required|date|after_or_equal:today',
            "certificate_title" => ['bail','required'],
            "student_id" => ['bail','required'],
            "certificate_body" => ['bail','required'],

        ];
        return $rules;
    }
}
