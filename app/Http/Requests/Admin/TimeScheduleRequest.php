<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TimeScheduleRequest extends FormRequest
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
            "start_time.*" => ['bail','required'],
            "end_time.*" => ['bail','required'],
        ];
        return $rules;
    }

    public function messages()
       {
           return [
               'start_time.*.required' => __('The start time is required'),
               'end_time.*.required' => __('The end time is required'),
           ];
       }
}
