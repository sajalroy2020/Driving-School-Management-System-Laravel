<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentPackagesRequest extends FormRequest
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
            "student_id" => ['bail','required'],
            "package_id" => ['bail','required'],
            "payment_id" => ['bail','required'],
        ];
        return $rules;
    }
}
