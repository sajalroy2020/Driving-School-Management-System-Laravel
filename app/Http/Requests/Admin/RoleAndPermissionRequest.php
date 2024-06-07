<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class RoleAndPermissionRequest extends FormRequest
{
    public function rules()
    {
        if ($this->id) {
            $rules['name'] = 'required|max:20|unique:roles,name,' . decrypt($this->id);
        } else {
            $rules['name'] = 'required|max:20|unique:roles,name';
        }
        return $rules;
    }
}
