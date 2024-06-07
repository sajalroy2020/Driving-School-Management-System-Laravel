<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
            "category_name" => ['bail','required', Rule::unique('categories','category_name')->ignore($id, 'id')->whereNull('deleted_at')],
        ];
        return $rules;
    }
}
