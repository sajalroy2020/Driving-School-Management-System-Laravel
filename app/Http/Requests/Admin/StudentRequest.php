<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentRequest extends FormRequest
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
            'address' => ['required']
        ];

        if (!$this->id) {
            $rules['password'] = ['required', 'string', 'min:6'];
        }
//        $rules['document_type.*'] = 'required';
//        $rules['document_name.*'] = 'required';
//        $rules['documents_file.*'] = 'required|file|mimes:jpeg,png,jpg';
        return $rules;
    }

//    public function messages()
//    {
//        return [
//            'document_type.*.required' => __('The document type is required'),
//            'document_name.*.required' => __('The document name is required.'),
//            'documents_file.*.required'  => __('The documents file is required.'),
//        ];
//    }
}
