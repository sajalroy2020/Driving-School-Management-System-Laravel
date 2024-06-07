<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class MaintenanceModeSettingRequest extends FormRequest
{
    public function rules()
    {
        $rules = [
            'maintenance_mode_status' => 'bail|required',
        ];

        if ($this->maintenance_mode_status == 2) {
            $rules['maintenance_mode_secret_key'] = 'bail|required';
            $rules['maintenance_mode_secret_url'] = 'bail|required';
        }
        return $rules;
    }

}
