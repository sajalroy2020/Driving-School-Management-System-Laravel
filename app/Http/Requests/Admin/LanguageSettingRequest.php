<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class LanguageSettingRequest extends FormRequest
{
    public function rules()
    {
        $rules = [
            'language_name' => 'bail|required',
            'iso_code' => 'bail|required',
            'rtl_enable' => 'bail|required',
        ];
        return $rules;
    }

}
