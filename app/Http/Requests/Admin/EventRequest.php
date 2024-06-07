<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EventRequest extends FormRequest
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
            "event_title" => ['bail','required'],
            'date_time' => 'bail|required|date|after_or_equal:today',
            "location" => ['bail','required'],
        ];
        return $rules;
    }
}
