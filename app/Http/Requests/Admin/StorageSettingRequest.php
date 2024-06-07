<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StorageSettingRequest extends FormRequest
{
    public function rules()
    {
        $rules = [
            'STORAGE_DRIVER' => 'bail|required',
        ];

        if ($this->STORAGE_DRIVER == STORAGE_DRIVER_PUBLIC) {
            $rules['ACCESS_KEY_ID'] = 'bail|required';
            $rules['SECRET_ACCESS_KEY'] = 'bail|required';
            $rules['DEFAULT_REGION'] = 'bail|required';
            $rules['BUCKET'] = 'bail|required';
        }
        return $rules;
    }

}
