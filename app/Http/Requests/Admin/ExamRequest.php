<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ExamRequest extends FormRequest
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
        $id = isset($this->id)?decrypt($this->id):null;
        $rules = [
            "exam_title" => ['bail','required'],
            "exam_type" => ['bail','required'],
            'exam_date' => 'bail|required|date|after_or_equal:today',
            "total_mark" => ['bail','required'],
            "package_id" => ['bail','required'],
            "duration_time" => ['bail','required'],
            "student_assign.*" => ['bail','required'],
        ];

        if ($this->exam_type == EXAM_TYPE_THEORETICAL) {
            $rules["question_assign.*"] = ['bail','required'];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'question_assign.*.required' => __('The question field is required'),
            'student_assign.*.required' => __('The student is required'),
        ];
    }
}
