<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TestimonialRequest extends FormRequest
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
            "title" => ['bail','required'],
            "comment" => ['bail','required'],
        ];

        if ($this->student_type == 1) {
            $rules["student_id"] = ['bail','required'];
        }else{
            $rules["name"] = ['bail','required'];
        }

        return $rules;
    }
}
