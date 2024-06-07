<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StaffRequest extends FormRequest
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
        $id = isset($this->id) ? decrypt($this->id) : null;
        $rules = [
            'name' => ['required', 'max:120'],
            "email" => ['bail', 'required', 'email', Rule::unique('users', 'email')->ignore($id, 'id')->whereNull('deleted_at')],
            "number" => ['bail', 'required', 'numeric', Rule::unique('users', 'phone')->ignore($id, 'id')->whereNull('deleted_at')],
            'gender' => ['required'],
            'date_of_birth' => ['required'],
            'role' => ['required'],
            'address' => ['required'],
            'contact_phone' => ['nullable', 'numeric'],
            'documents_file.*' => ['nullable', 'mimes:jpg,jpeg,png,bmp,gif,svg,webp,pdf,docx|max:1024']
        ];

        if (!$this->id) {
            $rules['password'] = ['required', 'min:6'];
        }
        return $rules;
    }

}
