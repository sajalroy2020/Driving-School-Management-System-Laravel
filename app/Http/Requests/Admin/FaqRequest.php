<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FaqRequest extends FormRequest
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
            "title" => ['bail','required', Rule::unique('faqs','title')->ignore($id, 'id')->whereNull('deleted_at')],
            "description" => ['bail','required'],
        ];
        return $rules;
    }
}
