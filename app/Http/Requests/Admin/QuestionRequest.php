<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class QuestionRequest extends FormRequest
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
        $rules["question_title"] = ['bail', 'required'];
        $rules["question_type"] = ['bail', 'required'];
        $rules["question_mark"] = ['bail', 'required'];

        if ($this->question_type == QUESTION_TYPE_SELECT_ONE || $this->question_type == QUESTION_TYPE_SELECT_MANY) {
            $rules["right_ans"] = ['required'];
            $rules["question_option.*"] = ['required'];
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'right_ans.required' => __('The question answear is required'),
            'question_option.*.required' => __('The question option field is required'),
        ];
    }
}
