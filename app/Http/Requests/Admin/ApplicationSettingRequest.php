<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ApplicationSettingRequest extends FormRequest
{
    public function rules()
    {
        $rules = [
            'app_name' => 'required',
            'app_email' => 'required|email',
            'app_timezone' => 'required',
        ];
        return $rules;
    }

}
