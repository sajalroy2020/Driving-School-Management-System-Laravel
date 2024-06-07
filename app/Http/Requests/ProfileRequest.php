<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileRequest extends FormRequest
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
            'name' => ['required', 'max:120'],
            "number" => ['bail','required','numeric', Rule::unique('users','phone')->ignore(auth()->id(), 'id')->whereNull('deleted_at')],
            'gender' => ['required'],
            'date_of_birth' => ['required'],
            'country' => ['required'],
            'city' => ['required'],
            'address' => ['required']
        ];
        return $rules;
    }
}
