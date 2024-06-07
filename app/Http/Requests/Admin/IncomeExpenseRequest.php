<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class IncomeExpenseRequest extends FormRequest
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
            "type" => ['bail','required'],
            "purpose" => ['bail','required'],
            "amount" => ['bail','required','regex:/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/'],
            "date" => ['bail','required'],
            "image" => ['nullable','mimes:jpg,jpeg,png,svg,webp,pdf,docx|max:1024'],
        ];
        return $rules;
    }
}
