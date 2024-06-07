<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CurrencyRequest extends FormRequest
{
    public function rules()
    {

        return [
                'currency_code' => 'required|unique:currencies,currency_code,'.$this->id,
                'currency_symbol' => 'required',
                'currency_placement' => 'required',
            ];
    }
}
