<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class InstructorRequest extends FormRequest
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
            'name' => ['required', 'max:120'],
            "email" => ['bail','required','email', Rule::unique('users','email')->ignore($id, 'id')->whereNull('deleted_at')],
            "number" => ['bail','required','numeric', Rule::unique('users','phone')->ignore($id, 'id')->whereNull('deleted_at')],
            'gender' => ['required'],
            'date_of_birth' => ['required'],
            'country' => ['required'],
            'city' => ['required'],
            'license_number' => ['required'],
            'address' => ['required'],
        ];

        if (!$this->id) {
            $rules['password'] = ['required', 'string', 'min:6'];
        }
        return $rules;
    }

}
