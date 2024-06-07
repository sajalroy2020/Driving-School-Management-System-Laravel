<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PackagesRequest extends FormRequest
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
            "category" => ['bail','required'],
            'package_name' => ['required', 'max:191',Rule::unique('packages')->where(function ($query){
                return $query->where('tenant_id', auth()->user()->tenant_id);
            })],
            "instructors.*" => ['bail','required'],
            "duration_type" => ['bail','required'],
            "duration_time" => ['bail','required'],
            'price' => ['required', 'regex:/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/'],
            "description" => ['bail','required'],
            "image" => ['nullable','mimes:jpg,jpeg,png,svg,webp|max:1024'],
        ];
        return $rules;
    }
}
